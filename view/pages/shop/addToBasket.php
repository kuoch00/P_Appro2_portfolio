<?php


/**
 * auteur : Elisa Kuoch
 * date :
 * description : page permettant ajout d'objets au panier
 */

 /*si premier article, creer un panier */
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array(
        array(
            "artId"=> $_POST["article"],
            "artQuantity"=> $_POST["quantity"] 
        ),
    );
}
/*ajout au panier */
else{
    //si deja existant, remplacer les valeurs
    #code

    //ajoute l'article au panier
    $data = array(
        "artId"=> $_POST["article"],
        "artQuantity"=> $_POST["quantity"] 
    );
    array_push($_SESSION['cart'], $data);
}
  //echo var_dump($_SESSION['cart']);
  //echo print_r($_SESSION['items']);
//  rediriger autrement?
// header("location:?page=shop&added");
?>
<div class="container">
<h1>Article successfully added to your shopping cart</h1>
<a class="btn btn-primary" href="?page=shop">Continue Shopping</a>
<a class="btn btn-primary" href="?page=checkout">Checkout</a>

</div>
