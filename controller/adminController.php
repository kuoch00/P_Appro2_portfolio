<?php
switch($_GET['admin']){
    case 'login':
        if($_SESSION['adminConnected']){
            //renvoie sur la page home
            header("Location: ?admin=home");
        }
        else{
            $connect = new Database();
            //tentative de connection
            if(isset($_POST['username'])){
                // $checkAdmin = $connect->

            }

            //page de connection
            else{
                // echo "test";
                include("view/pages/admin/login.php");
            }
            
        } 
        break;
    case 'home':
        include("view/pages/admin/home.php");
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
    default :
    include("view/404.php");
        break;
}

?>