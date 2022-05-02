
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où l'on consulte le panier
-->
<div class="container">
<h1>Shopping Cart</h1>
<?php
// todo ? : possibilité ajouter +- quantité / supp article
// $_SESSION["items"];

if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
    include("./view/pages/shop/arrayCart.php");?>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-secondary" href="?order=shop">Continue Shopping</a>
        <a class="btn btn-primary" href="?order=shipping">Order</a>
    </div>
        <?php
}//fin cart isset
else{
    ?>
    <p>Your cart is empty</p> <br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary" href="?order=shop">Go Shopping</a>
    </div>
    <?php
}

?>

</div>
