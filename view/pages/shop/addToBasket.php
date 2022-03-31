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
    #il le fait deja tout seul car la derniere entrée met a jour dans basket.php
    
    //ajoute données entrées dans un tableau
    $data = array(
        "artId"=> $_POST["article"],
        "artQuantity"=> $_POST["quantity"] 
    );

    //supprime ancienne entrée si deja existante

    $i = 0;
    foreach($_SESSION['cart'] as $row){
        if($row['artId']==$data['artId']){
            array_splice($_SESSION['cart'], $i);
        }
    }
        // $cart = $_SESSION['cart'];
        
        // $i = 0;
        // for ($i=0; $i < count($_SESSION['cart']) ; $i++) { 
            
        //     $row = $_SESSION['cart'][$i];
        //     if($row['artId'] == $data['artId']){
        //         array_splice($_SESSION['cart'][$i],1);
        //         break;
        //     }
        //     else{
        //         $i++;
        //     }
            

        //     # code...
        // }

        // foreach ($_SESSION['cart'] as $row){
            
        //     if($row['artId'] == $data['artId']){
        //         unset($row);
        //         // 
        //         break;
        //     }
        //     else{
        //         $i++;
        //     }
            
        // }

        // foreach ($_SESSION['cart'] as $row){
        //     if($row['artId'] == $data['artId']){
        //         unset($_SESSION['cart'][$i]);
        //         //echo $i;
        //         break;
        //     }
        //     else{
        //         $i++;
        //     }
            
        // }

        //variante 
        //remplace donnée si existante
        // foreach ($_SESSION['cart'] as $row){
        //     if($row['artId'] == $data['artId']){
        //         //echo $row['artQuantity'] .  "!=" . $data['artQuantity'];
        //         $row = array_replace($row, $data);
        //         //$row['artQuantity'] = $data['artQuantity'];
        //         break;
        //     }
        // }
    

    array_push($_SESSION['cart'], $data);
    print_r($_SESSION['cart']);
    //unset($_SESSION['cart']);

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
