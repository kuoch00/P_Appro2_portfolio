<?php


/**
 * auteur : Elisa Kuoch
 * date : 31.03.2022
 * description : page permettant ajout d'objets au panier
 */

 /*si premier article ajouté, creer un panier */
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
    //ajoute données entrées dans un tableau
    $input = array(
        "artId"=> $_POST["article"],
        "artQuantity"=> $_POST["quantity"] 
    );

    //remet les variables à 0
    $changed = false;
    $i = 0;

    //remplace ancienne quantité de l'article s'il est deja dans le panier
    foreach($_SESSION['cart'] as $row){
        if($row['artId']==$input['artId']){
            
            //remplace le tableau concernant l'article avec le nouveau (input)
            $_SESSION['cart'][$i] = array_replace($row, $input);

            //lors changement donnée : entrer depuis $session[cart][index]
            //print_r($_SESSION['cart'][$i]) . "<br>";
            //$row['artQuantity'] = $input['artQuantity'];
            // print_r($row);

            //indique qu'une donnée a changé
            $changed = true;
            
            break;
        }
        $i++;
    }

    //si pas de changement = nouvel article
    if($changed==false){
        // $basket = $input;
        array_push($_SESSION['cart'], $input);
    }
    
        // $cart = $_SESSION['cart'];
        
        // $i = 0;
        // for ($i=0; $i < count($_SESSION['cart']) ; $i++) { 
            
        //     $row = $_SESSION['cart'][$i];
        //     if($row['artId'] == $input['artId']){
        //         array_splice($_SESSION['cart'][$i],1);
        //         break;
        //     }
        //     else{
        //         $i++;
        //     }
            

        //     # code...
        // }

        // foreach ($_SESSION['cart'] as $row){
            
        //     if($row['artId'] == $input['artId']){
        //         unset($row);
        //         // 
        //         break;
        //     }
        //     else{
        //         $i++;
        //     }
            
        // }

        // foreach ($_SESSION['cart'] as $row){
        //     if($row['artId'] == $input['artId']){
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
        //     if($row['artId'] == $input['artId']){
        //         //echo $row['artQuantity'] .  "!=" . $input['artQuantity'];
        //         $row = array_replace($row, $input);
        //         //$row['artQuantity'] = $input['artQuantity'];
        //         break;
        //     }
        // }
        
    

    
    //print_r($_SESSION['cart']);
    //unset($_SESSION['cart']);

}
  //echo var_dump($_SESSION['cart']);
  //echo print_r($_SESSION['items']);
//  rediriger autrement?
// header("location:?order=shop&added");
?>
<div class="container">
    <div class="alert alert-success" role="alert">
        Article successfully added to your shopping cart !
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary" href="?order=shop">Continue shopping</a>
        <a class="btn btn-primary" href="?order=checkout">My cart</a> 
    </div>
</div>
