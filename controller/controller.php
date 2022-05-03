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
                        if($subcatId == "all"){
                            $listGallery = $connect->getGalleryAll($catId);
                        }
                        else{
                            //liste la gallerie
                            $listGallery = $connect->getGallery($catId, $subcatId);
                        } 
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
                // echo $_SESSION['lastpage'];
                //tentative de connection
                if(isset($_POST['username'])){
                    //verification
                    $userCheck = $connect->CheckUser($_POST['username'], $_POST['password']);
                    
                    //réussi
                    if($userCheck){
                        $_SESSION["connected"] = true;
                        $_SESSION["userinfo"] = $connect->getUserInfo($_POST["username"]);
                        
                        // echo "successsfullyyy connectted";
                        $isInvalid = false;
                       //contourner avec bouton  hihi
                       
                        // if(isset($_SESSION['lastpage'])){
                        //     echo "ok";
                        //     header("Location:" . $_SESSION['lastpage']);
                        // }
                        
                        include("view/pages/shop/successfulConnection.php");

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
                else{//page de connection
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
                if(isset($_SESSION['connected']) && $_SESSION['connected']){
                    $userInfo = $_SESSION["userinfo"];
                    include("view/pages/shop/fillAddress.php");
                }
                else{
                    include("view/pages/shop/login.php");
                }
                //include shipping tracking
                break;

            case 'summary':
                $connect = new Database();
                $products = $connect->getProducts();
                $userInfo = $_SESSION["userinfo"];
                if(isset($_SESSION['cart'])){ 
                    $cartProducts = $connect->getCartProducts($_SESSION['cart']);
                }
                    include("view/pages/shop/summary.php");
                break;

            case 'account':
                $connect = new Database();
                $userInfo = $_SESSION["userinfo"];
                
                //odifier addresse
                if(isset($_GET['option'])){
                    $option = $_GET['option'];
                    //page modif adresse
                    if($option == "updateAddress"){
                        include("view/pages/shop/fillAddress.php"); 
                    }
                    //modifie adresse
                    else if($option == "updatingAddress"){ 
                        //gere les char spéciaux
                        $newPost = array_map('htmlspecialchars' , $_POST);
                        $updateAddress = $connect->updateAddress(
                            // $userInfo[0]['cliEmailAddress'],
                            // $_POST['firstname'],
                            // $_POST['lastname'],
                            // $_POST['address'],
                            // $_POST['postalCode'],
                            // $_POST['city'],
                            // $_POST['state'],
                            // $_POST['country'],
                            // $_POST['phoneNumber'] 
                            $userInfo[0]['cliEmailAddress'],
                            $newPost['firstname'],
                            $newPost['lastname'],
                            $newPost['address'],
                            $newPost['postalCode'],
                            $newPost['city'],
                            $newPost['state'],
                            $newPost['country'],
                            $newPost['phoneNumber']
                            
                        );
                        $_SESSION["userinfo"] = $connect->getUserInfo($userInfo[0]['cliEmailAddress']);

                        include("view/pages/shop/account.php");
 
                    }
                    // elseif($option == "addAddress"){
                    //     include("view/pages/shop/fillAddress.php");
                    // }
                    else{
                        
                        include("view/pages/404.php");
                    }
                    $_SESSION["userinfo"] = $connect->getUserInfo($userInfo[0]['cliEmailAddress']);
                    
                    
                }
                else{
                    $orders = $connect->getOrders($userInfo[0]['idClient']);
                    include("view/pages/shop/account.php"); 
                    
                }

                break;

            case 'createAccount':
                $connect = new Database();
                // $isInvalid=true;
                if(isset($_POST["email"])){ 
                    $email = $_POST["email"];
                    //true = already used // false = free
                    $accountExists = $connect->checkEmailAddress($email);
                    if($accountExists){ 
                        $isInvalid = true;
                        include("view/pages/shop/createAccount.php"); 
                    }
                    else{
                        //crée un compte
                        //adresse bonne, allons entrer ca dans la db
                        $isInvalid = false;
                        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                        $createAccount = $connect->createAccount($_POST['email'], $password);
                        include("view/pages/shop/account.php"); 
                    }
                    
                }
                else{
                    $isInvalid = false;
                    $accountExists = 0;
                    include("view/pages/shop/createAccount.php"); 
                }
                break; 

            case 'confirm':
                    // change adresse (si besoin)
                    $connect = new Database();
                    // $_SESSION["userinfo"] = $connect->getUserInfo($userInfo[0]['cliEmailAddress']);;
                    // $userInfo = $_SESSION["userinfo"];
                    //update adress ($post dont work)
                    //add order in db
                    $newPost = array_map('htmlspecialchars' , $_SESSION['address']);
                    //print_r($_SESSION["address"]);
                    $updateAddress = $connect->updateAddress(
                        // $userInfo[0]['cliEmailAddress'],
                        // $_POST['firstname'],
                        // $_POST['lastname'],
                        // $_POST['address'],
                        // $_POST['postalCode'],
                        // $_POST['city'],
                        // $_POST['state'],
                        // $_POST['country'],
                        // $_POST['phoneNumber'] 
                        $newPost['emailAddress'],
                        $newPost['firstname'],
                        $newPost['lastname'],
                        $newPost['address'],
                        $newPost['postalCode'],
                        $newPost['city'],
                        $newPost['state'],
                        $newPost['country'],
                        $newPost['phoneNumber']
                        
                    );
                    //prend les nouvelles informations
                    $_SESSION["userinfo"] = $connect->getUserInfo($newPost['emailAddress']);

                    //add order in db
                    $addOrder = $connect->addOrder($_SESSION['userinfo'][0]['idClient'], $_SESSION['total']);
                    //idclient
                    //$total = arrayCart.php

                    // $_SESSION["userinfo"] = $connect->getUserInfo($userInfo[0]['cliEmailAddress']);
                    // $addOrder = $connect->addOrder($userInfo[0]['idClient'], /* $total */);
                    
                    //reduction des stocks
                    foreach($_SESSION['cart'] as $article){
                        $stockreduc = $connect->reduceStocks($article['artId'], $article['artQuantity']);
                        
                    }


                    //DELETE SHOPPING CART
                    unset($_SESSION['cart']);

                    header("Location: ?order=thanks");
                
                break;
            case 'thanks':
                include ("view/pages/shop/thankyou.php");
                break;
                # code...
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
