
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où l'on consulte le panier
-->
<div class="container">
<?php

// $_SESSION["items"];

if(isset($_SESSION['cart'])){
    ?>
    
    <table class="table">
        <tr>
            <th scope="col">article name</th>
            <th scope="col">price</th>
            <th scope="col">quantity</th>
            <th scope="col">subtotal</th>
        </tr>
        
    <?php
    $cart = $_SESSION['cart'];
            print_r($cart);

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
        }
    }
    
    
    ?>
   </table>
   
    <?php
}
else{
    echo "il n'y a rien dans votre panier";
}


?>
</div>
