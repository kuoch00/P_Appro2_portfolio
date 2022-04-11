<?php
/**
 * auteur : Elisa Kuoch
 * date de création : 21.03.2022
 * description : controlleur de l'application
 */
ob_start();

    include("model/model.php");
    include("view/view.php");//header (img et nav)
    
    //pages
    if(isset($_GET["page"])){
        switch($_GET["page"]){

            case 'home':
                $connect= new Database();
                $listProjects = $connect->getProjectList();
                include("view/pages/home.php");
                break;

            case 'projects':
                $connect= new Database();
                //set directement si school work selectionné
                if(isset($_GET["catId"])){
                    $catId = $_GET["catId"];

                    //subcat défini => gallery
                    if(isset($_GET["subcatId"])){
                        
                        $subcatId = $_GET["subcatId"];

                        //liste la gallerie
                        $listGallery = $connect->getGallery($catId, $subcatId);
                        
                        include("view/pages/projects/gallery.php");
                    }
                    // va afficher les subcat selon le projet/school work
                    else{
                        //show project details
                        $projectInfo = $connect->getProjectDescription($catId);
                        
                        //liste des subcat
                        $listSubcategories = $connect->getSubcategoryList($catId);
                        include("view/pages/projects/subfolders.php");
                    }

                }
                else{
                    //affiche liste projets
                    $listProjects = $connect->getProjectList();
                    include("view/pages/projects/list.php");
                }
                break;

            case 'contact':
                // $connect= new Database();
                include("view/pages/contact.php");
                break;
            default :
                include("view/pages/404.php");
                break;

        }
    }
    else if (isset($_GET["order"])){
        include("view/pages/shop/shopNav.php");
        switch($_GET['order']){
            case 'shop':
                $connect= new Database();
                $products = $connect->getProducts();
                
                // var_dump($products);
                if(isset($_GET["artId"])){
                    $artId = $_GET["artId"]; 
    
                    if(isset($_GET["addedToCart"])){
                        include("view/pages/shop/addToBasket.php");
                    }
                    else{
                        include("view/pages/shop/details.php");
                    }
                }  
                else{
                    include("view/pages/shop/products.php");
                }
                break;
    
            case 'checkout':
                $connect = new Database();
                $products = $connect->getProducts();
    
                //panier
                if(isset($_SESSION['cart'])){ 
                    $cartProducts = $connect->getCartProducts($_SESSION['cart']);
                }
                include("view/pages/shop/basket.php");
            
                break;

            case 'login':
                $connect = new Database();
                
                //tentative de connection
                if(isset($_POST['username'])){
                    //verification
                    $userCheck = $connect->CheckUser($_POST['username'], $_POST['password']);
                    
                    //réussi
                    if($userCheck == true){
                        $_SESSION["connected"] = true;
                        // echo "successsfullyyy connectted";
                        $isInvalid = false;
                       //contourner avec bouton  hihi
                        
                        header("Location: ?order=successfulConnection");
                        
                        
                        //header("Location: " . $_SERVER["HTTP_REFERER"]);//retourner a page précédente si btn etait bouton login (là fait order=login&check=0 à order=login :/) 
                        ///get order=$?
                        //autre : va a la page suivante = processus de commande
                    } 
                    //raté
                    else{
                        //erreur
                        $isInvalid = true;
                        include("view/pages/shop/login.php");
                        //header("Location: " . $_SERVER["HTTP_REFERER"]);//avec erreur retour a order=login
                    }
                }
                else{
                    include("view/pages/shop/login.php"); 
                }
                break;
                
            case 'successfulConnection' :
                include("view/pages/shop/successfulConnection.php");
                break;

            case 'disconnect' :
                if(isset($_SESSION["connected"]) && $_SESSION["connected"]){
                    unset($_SESSION["connected"]);
                    unset($_SESSION["username"]);
                    unset($_SESSION["password"]);
                    unset($_SESSION["cart"]);
                    // echo "Successfully disconnected";
                    header("Location: ?order=shop");
                }
            case 'shipping':
                # code...
                //include shipping tracking
                include("view/pages/shop/fillAddress.php");
                break;

            case 'summary':
                $connect = new Database();
                $products = $connect->getProducts();
                if(isset($_SESSION['cart'])){ 
                    $cartProducts = $connect->getCartProducts($_SESSION['cart']);
                }
                    include("view/pages/shop/summary.php");
                    break;

            case 'account':
                include("view/pages/shop/account.php");
                break;

            case 'createAccount':
                $connect = new Database();
                // $isInvalid=true;
                if(isset($_POST["email"])){ 
                    $email = $_POST["email"];
                    //true = already used // false = free
                    $accountExists = $connect->checkEmailAddress($email);
                    if($accountExists=="true"){
                        
                        $isInvalid = "true";
                    }
                    else{
                        $isInvalid = "false";
                    }
                    include("view/pages/shop/createAccount.php");

                }
                else{
                    $isInvalid = "false";
                    $accountExists = 0;
                    include("view/pages/shop/createAccount.php");

                }
                break;

            default :
                include("view/pages/404.php");
                break;
            
        }
        

    }
    else{
        // permet de redirectionner directement la page home s'il n'y a rien
        echo "<script>location.href=\"?page=home\"</script>";
    }
    

    ob_end_flush(); 
?>
