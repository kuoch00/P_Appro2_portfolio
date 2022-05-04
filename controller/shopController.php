<?php
include_once("model/shopModel.php");
switch($_GET['order']){
    case 'shop':
        $connect= new ShopModel();
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
        $connect = new ShopModel();
        $products = $connect->getProducts();

        //panier
        if(isset($_SESSION['cart'])){ 
            $cartProducts = $connect->getCartProducts($_SESSION['cart']);
        }
        include("view/pages/shop/basket.php");
    
        break;

    case 'login':
        $connect = new ShopModel();
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
            unset( $_SESSION["userinfo"]);
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
        $connect = new ShopModel();
        $products = $connect->getProducts();
        $userInfo = $_SESSION["userinfo"];
        if(isset($_SESSION['cart'])){ 
            $cartProducts = $connect->getCartProducts($_SESSION['cart']);
        }
            include("view/pages/shop/summary.php");
        break;

    case 'account':
        $connect = new ShopModel();
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
                
                include("view/404.php");
            }
            $_SESSION["userinfo"] = $connect->getUserInfo($userInfo[0]['cliEmailAddress']);
            
            
        }
        else{
            $orders = $connect->getOrders($userInfo[0]['idClient']);
            include("view/pages/shop/account.php"); 
            
        }

        break;

    case 'createAccount':
        $connect = new ShopModel(); 

        //verification de l'adresse email
        //elle ne doit pas deja exister dans la db
        if(isset($_POST["email"])){ 
            $email = $_POST["email"];
            $accountExists = $connect->CheckIfUserExists($email);
            if($accountExists){ 
                //message d'erreur
                $isInvalid = true;
                //renvoie sur la creation de compte
                include("view/pages/shop/createAccount.php"); 
            }
            else{
                //crée un compte 
                $isInvalid = false;
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $createAccount = $connect->createAccount($_POST['email'], $password);
                
                //renvoie sur la page du compte
                // include("view/pages/shop/account.php"); 
                $_SESSION["connected"] = true;
                $_SESSION["userinfo"] = $connect->getUserInfo($_POST["email"]);
                
                header("Location: ?order=account");
            } 
        }
        //page de création de compte
        else{
            $isInvalid = false;
            $accountExists = 0;
            include("view/pages/shop/createAccount.php"); 
        }
        break; 

    case 'confirm':
            // change adresse (si besoin)
            $connect = new ShopModel();
            /*
                // $_SESSION["userinfo"] = $connect->getUserInfo($userInfo[0]['cliEmailAddress']);;
                // $userInfo = $_SESSION["userinfo"];
                //update adress ($post dont work)
                //add order in db
            
            */
            $newPost = array_map('htmlspecialchars' , $_SESSION['address']);
            //print_r($_SESSION["address"]);
            $updateAddress = $connect->updateAddress(
                /*
                    // $userInfo[0]['cliEmailAddress'],
                    // $_POST['firstname'],
                    // $_POST['lastname'],
                    // $_POST['address'],
                    // $_POST['postalCode'],
                    // $_POST['city'],
                    // $_POST['state'],
                    // $_POST['country'],
                    // $_POST['phoneNumber'] 
                */ 
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
            //maj du tableau
            //prend les nouvelles informations
            $_SESSION["userinfo"] = $connect->getUserInfo($newPost['emailAddress']);

            //add order in db
            $addOrder = $connect->addOrder($_SESSION['userinfo'][0]['idClient'], $_SESSION['total']);
            /*
                //idclient
                //$total = arrayCart.php

                // $_SESSION["userinfo"] = $connect->getUserInfo($userInfo[0]['cliEmailAddress']);
                // $addOrder = $connect->addOrder($userInfo[0]['idClient']);
                
            */ 
            //reduction des stocks
            foreach($_SESSION['cart'] as $article){
                $stockreduc = $connect->reduceStocks($article['artId'], $article['artQuantity']);
            }

            //DELETE SHOPPING CART
            unset($_SESSION['cart']);
            
            //redirect vers remerciments
            header("Location: ?order=thanks"); 
        break;
    case 'thanks':
        include ("view/pages/shop/thankyou.php");
        break; 

    default :
        include("view/404.php");
        break;
    
}
?>