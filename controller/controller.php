<?php
/**
 * auteur : Elisa Kuoch
 * date de création : 21.03.2022
 * description : controlleur de l'application
 */

    include("model/model.php");
    include("view/view.php");//header (img et nav)
    //pages
    if(isset($_GET["page"])){
        switch($_GET["page"]){

            case 'home':
                include("view/pages/home.php");
                break;
            
            case 'projects':
                //id >1
                $connect = new Database();
                if(isset($_GET["catId"])){
                    $catId = $_GET["catId"];
                    


                    if(isset($_GET["subcatId"])){
                        $subcatId = $_GET["subcatId"];

                        include("view/pages/projects/gallery.php");

                    }
                    else{
                        $listSubcategories = $connect->getSubcategoryList($catId);
                        include("view/pages/projects/subfolders.php");
                    }
                }
                else{
                    // il n'y a pas catId 
                    $listProjects = $connect->getProjectList();
                    include("view/pages/projects/list.php");
                }
                break;
            case 'school':
                //id = 1
                $listSubcategories = $connect->getSubcategoryList(1);
                include("view/pages/schoolWork/subfolders.php");
                break;
                
            case 'shop':
                include("view/pages/shop/products.php");
                break;
            case 'contact':
                include("view/pages/contact.php");
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


?>
