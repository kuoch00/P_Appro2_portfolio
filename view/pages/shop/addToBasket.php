<?php


/**
 * auteur : Elisa Kuoch
 * date :
 * description : page permettant ajout d'objets au panier
 */

$_SESSION['items'] = array(
    $_POST["article"] => $_POST["quantity"]
); 
//  echo var_dump($_SESSION['items']);

//  rediriger autrement?
// header("location:?page=shop&added");
?>
<div class="container">
<h1>Article successfully added to your shopping cart</h1>
<a class="btn btn-primary" href="?page=shop">Continue Shopping</a>
<a class="btn btn-primary" href="?page=checkout">Checkout</a>

</div>
