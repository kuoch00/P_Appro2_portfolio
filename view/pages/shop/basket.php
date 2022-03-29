
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où l'on consulte le panier
-->
<?php

// $_SESSION["items"];
foreach($_SESSION["items"] as $item => $price){
    echo $item . " => " . $price .  "<br>";
}


?>
