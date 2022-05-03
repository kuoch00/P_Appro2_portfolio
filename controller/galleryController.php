<?php
switch($_GET["page"]){ 
    case 'home':
        $connect= new Database();
        $listProjects = $connect->getProjectList();
        include("view/pages/home.php");
        break;

    case 'projects':
        $connect= new Database();
        //set directement catId=1 si school work selectionné (défini dans le nav)
        //
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
            // va afficher les cat selon le projet/school work
            else{
                
                //vérifie que l'id existe
                $catExists = $connect->catExists($catId);
                if($catExists){
                    //show project details 
                    $projectInfo = $connect->getProjectDescription($catId);
                    
                    //liste des subcat
                    $listSubcategories = $connect->getSubcategoryList($catId);
                    include("view/pages/projects/subfolders.php");
                }
                else{//id n'existe pas
                    include('view/404.php');
                }
                
            }

        }
        //si pas de catId : on se trouve sur la liste des projets
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
        include("view/404.php");
        break;

}

?>