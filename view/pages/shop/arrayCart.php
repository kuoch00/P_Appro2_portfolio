<div>
    <table class="table ">
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
                <th scope="row"><a href="?order=shop&artId=<?= $product['idArticle']?>"><?=$product['artName']?></a></td>
                <td><?=$product['artPrice']?> $</td>
                <td><?=$quantity?> </td>
                <td><?=$product['artPrice']*$quantity . " $"?></td>
                

            </tr>
        <?php
        //ajoute au sous-total
        $subtotal += $product['artPrice']*$quantity;
        }
    }
    
    
//fin de la commande
    if($_GET['order']=='summary' && isset($trackingFee) && $trackingFee!=0){
        ?>
        <tr>
            <th>Subtotal</th>
            <td></td>
            <td></td>
            <td><?=$subtotal . " $"?></td>
        </tr>
        <tr>
            <th>Tracking</th>
            <td></td>
            <td></td>
            <td><?=$trackingFee . " $"?></td>
        </tr>
        <tr>
            <th>Total</th>
            <td></td>
            <td></td>
            <td><?=$subtotal + $trackingFee . " $"?></td>
        </tr>
        <?php
        $total = $subtotal + $trackingFee;  
        $_SESSION['total'] = $subtotal + $trackingFee;
        
    }
    else{ //order=checkout ou summary et no tracking
        ?>
        <tr>
            <th>Total</th>
            <td></td>
            <td></td>
            <td><?=$subtotal?> $</td>
        </tr>
        <?php
        $total = $subtotal;
        $_SESSION['total'] = $subtotal ;
    }
        ?>
        </table>
</div>
