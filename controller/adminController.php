<?php
include_once("model/adminModel.php");

switch($_GET['admin']){
    case 'login':
        if(isset($_SESSION['adminConnected']) && $_SESSION['adminConnected']){
            //renvoie sur la page home
            header("Location: ?admin=home");
        }
        else{ 
            //tentative de connection
            if(isset($_POST['username'])){
                
                $connect = new Database();
                // $checkAdmin = $connect->
                $_SESSION['adminConnected']=true; 
                header('Location: ?admin=home');
            }

            //page de connection
            else{
                // echo "test";
                include("view/pages/admin/login.php");
            } 
        } 
        break;
    case 'home':
        $connect = new AdminModel();
        $listProjects = $connect->getCategories();
        if(isset($_POST['option'])){
            echo $_POST['option'];
        }
        else{
            include("view/pages/admin/home.php");
        }
        break;
    case 'edithome':
        include("view/pages/admin/editHome.php");
        break;
    case 'works':
        if(isset($_GET['option'])){
           switch($_GET['option']){
            case 'add':
                $connect= new AdminModel();
                if(isset($_POST['category'])){//insert in db
                    echo $_POST['category'] . "<br>" . $_POST['subCategory'] . "<br>" . $_FILES['image']['name'];
                    // die();

                    //verifier si catégorie existe
                    //+get id car on a que le nom
                    $category = $connect->getCategory($_POST['category']);

                    //si retourne rien : elle n'existe pas donc il faut la créer
                    if(empty($category)){ 
                        $isNewCat = true;
                        $add = $connect->addCategory($_POST['category']);
                        //prendre data de la nouvelle category
                        $category = $connect->getCategory($_POST['category']);
                    }
 
                    //verifier si sub-catégorie existe
                    $subCategory = $connect->getSubcategory($_POST['subCategory']);

                    //si retourne rien : elle n'existe pas donc il faut la créer
                    if(empty($subCategory)){
                        $add = $connect->addSubCategory($_POST['subCategory']);
                        //prendre data de la nouvelle category
                        $subCategory = $connect->getSubCategory($_POST['subCategory']);
                    }

                    //ajoute a la bd
                    $addWork = $connect->addWork( $category[0]['idCategory'], $subCategory[0]['idSubCategory'], $_FILES['image']['name']);
                    
                    //ajoute dans les fichiers
                    $source = $_FILES['image']['tmp_name'];            
                    $destination = "resources/img/" . $_FILES['image']['name'];
                    $moveFile = move_uploaded_file($source, $destination);

                    include('view/pages/admin/successfulAdd.php');
                }
                else{//forms
                    
                    $listCategories = $connect->getCategories();
                    $listSubcat = $connect->getSubcategories();
                    include('view/pages/admin/addWork.php');
                }
                
                break;
            case 'editProject':
                $connect = new AdminModel();
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $projectInfo = $connect->getProject($id);
                    include('view/pages/admin/editProject.php');
                }
                break;
            case 'delete':
                # code...
                // if(isset($_GET['id'])){
                //     $id = $_GET['id'];
                //     $projectInfo = $connect->getProject($id);
                //     include('view/pages/admin/editProject.php');
                // }
                break;
            default :

                break;
            } 
        }
        else{
            // include
        }
        
        break;
    // shop
    case 'addItem':
        if (isset($_POST['name'])) {
            $connect= new AdminModel();
            $addArticle = $connect->addArticle($_POST['name'], $_POST['description'], $_POST['price'], $_POST['stock'], $_FILES['image']['name']);
            $source = $_FILES['image']['tmp_name'];            
            $destination = "resources/img-shop/" . $_FILES['image']['name'];
            $moveFile = move_uploaded_file($source, $destination);
            include('view/pages/admin/itemAdded.php');
            # code...
        }
        else{
            include('view/pages/admin/addItem.php');
        }
        
        break;
    default :
    include("view/404.php");
        break;
}

?>