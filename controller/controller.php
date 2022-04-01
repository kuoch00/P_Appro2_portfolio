<?php
/**
 * auteur : Elisa Kuoch
 * date de création : 21.03.2022
 * description : controlleur de l'application
 */

    include("model/model.php");
    include("view/view.php");//header (img et nav)
    session_start();
    //pages
    if(isset($_GET["page"])){
        switch($_GET["page"]){

            case 'home':
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

            //old
            // case 'projects':
            //     //id >1
            //     $connect = new Database();
            //     if(isset($_GET["catId"])){
            //         $catId = $_GET["catId"];
                    
            //         if(isset($_GET["subcatId"])){
            //             $subcatId = $_GET["subcatId"];
            //             include("view/pages/projects/gallery.php");

            //         }
            //         else{
            //             $listSubcategories = $connect->getSubcategoryList($catId);
            //             include("view/pages/projects/subfolders.php");
            //         }
            //     }
            //     else{
            //         // il n'y a pas catId 
                   
            //         include("view/pages/projects/list.php");
            //     }
            //     break;
            // case 'school':
            //     //id = 1
            //     //
            //     $listSubcategories = $connect->getSubcategoryList(1);
            //     include("view/pages/schoolWork/subfolders.php");
            //     break;
                
            

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
                //si deja login, passer à la prochaine étape?
                include("view/pages/shop/login.php");
                break;

            case 'shipping':
                # code...
                //include shipping tracking
                    include("view/pages/shop/fillAddress.php");
                break;

            case 'summary':
                # code...
                break;
                
            default :
                include("view/pages/404.php");
                break;
            
        }
        

    }
    else{
        // permet de redirectionner directement la page home s'il n'y a rien
        //echo "<script>location.href=\"?page=home\"</script>";
    }


?>
