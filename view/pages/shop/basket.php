
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où l'on consulte le panier
-->
<div class="container">
<h1>Panier</h1>
<?php

// $_SESSION["items"];

if(isset($_SESSION['cart'])){
    ?>
    
    <table class="table">
        <tr>
            <th scope="col">Article name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
        </tr>
        
    <?php
    $subtotal = 0;
    $cart = $_SESSION['cart'];
            //print_r($cart);

            //GET QUANTITY 
            // $cart[3]['artId']



    //echo print_r($cartProducts);
        //die();
        //echo $product['idArticle'];
    foreach($cartProducts as $row ){
        foreach($row as $product){
            

            //MATCHES ID FROM SESSION CART AND ID FROM DB
            foreach ($cart as $article){
                if ($article['artId'] == $product['idArticle']){
                    //met a jour la quantité voulue avec derniere entrée de user
                    $quantity = $article['artQuantity'];
                }
            }
          ?>  
            <tr>
                <th scope="row"><?=$product['artName']?></td>
                <td><?=$product['artPrice']?></td>
                <td><?=$quantity?></td>
                <td><?=$product['artPrice']*$quantity?></td>
            </tr>
        <?php
        //ajoute au sous-total
        $subtotal += $product['artPrice']*$quantity;
        }
    }
    
    ?>
    <tr>
        <th>Total</th>
        <td></td>
        <td></td>
        <td><?=$subtotal?></td>

    </tr>
    <?php
    ?>
    </table>
    <a class="btn btn-primary" href="?page=shop">Continue Shopping</a>
    <a class="btn btn-primary" href="?page=checkout&order=login">Order</a>
   
    <?php
}
else{
    echo "Your cart is empty";
    ?>
    <a class="btn btn-primary" href="?page=shop">Go Shopping</a>
    <?php
}

?>

</div>
