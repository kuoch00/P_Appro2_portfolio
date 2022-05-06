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
                # code...
                break;
            case 'edit':
                # code...
                break;
            case 'delete':
                # code...
                break;
            default :

                break;
            } 
        }
        else{
            // include
        }
        
        break;
    case 'addItem':
        if (isset($_POST['name'])) {
            $connect= new AdminModel();
            $addArticle = $connect->addArticle($_POST['name'], $_POST['description'], $_POST['price'], $_POST['stock'], $_FILES['image']['name']);
            $source = $_FILES['image']['tmp_name'];            
            $destination = "resources/img-shop/" . $_FILES['image']['name'];
            $test = move_uploaded_file($source, $destination);
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