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
        include ("galleryController.php");
    }
    elseif (isset($_GET["order"])){
        include("view/pages/shop/shopNav.php");
        include("shopController.php");
        

    }
    elseif (isset($_GET["admin"])){
        include("adminController.php");
    }
    else{
        // permet de redirectionner directement la page home s'il n'y a rien
        echo "<script>location.href=\"?page=home\"</script>";
    }
    
    ob_end_flush(); 
?>
