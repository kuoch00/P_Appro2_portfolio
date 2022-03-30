
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où l'on consulte le panier
-->
<?php

// $_SESSION["items"];

if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $array){
        echo $array['artId'] . " => " . $array['artQuantity'] . "<br>";
    }
}
else{
    echo "caca";
}


?>
