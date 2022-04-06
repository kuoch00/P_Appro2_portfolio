
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où l'on consulte le panier
-->
<div class="container">
<h1>Panier</h1>
<?php
// todo ? : possibilité ajouter +- quantité / supp article
// $_SESSION["items"];

if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
    include("./view/pages/shop/arrayCart.php");?>
        <a class="btn btn-primary" href="?order=shop">Continue Shopping</a>
        <a class="btn btn-primary" href="?order=login">Order</a>
    
        <?php
}//fin if isset cart
else{
    echo "Your cart is empty";
    ?>
    <a class="btn btn-primary" href="?order=shop">Go Shopping</a>
    <?php
}

?>

</div>
