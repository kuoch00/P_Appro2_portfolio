<?php
switch($_GET['admin']){
    case 'login':
        echo "test";
        break;
    default :
    include("view/404.php");
        break;
}

?>