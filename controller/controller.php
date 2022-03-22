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
                include("view/pages/projects/list.php");
                break;
            case 'school':
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


?>
