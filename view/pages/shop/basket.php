
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où l'on consulte le panier
-->
<?php

// $_SESSION["items"];

if(isset($_SESSION['cart'])){
    ?>
    <table>
        <tr>
            <th>article</th>
            <th>prix</th>
            <th>quantité</th>
            <th>sous total</th>
        </tr>
        
    <?php
    echo print_r($cartProducts);
        //die();
        //echo $product['idArticle'];
    foreach($cartProducts as $row ){
        foreach($row as $product){
          ?>  
            <tr>
                <td><?=$product['artName']?></td>
                <td><?=$product['artPrice']?></td>
                <td>eu</td>
                <td>eu</td>
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
