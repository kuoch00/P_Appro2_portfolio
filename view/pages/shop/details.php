<?php

?>

<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où on consulte les détails d'un article
-->

<div class="container">
<?php ?>
<a href="?page=shop"><- retour</a><br>
<img src="/resources/img-shop/<?=$products[$artId-1]["artImage"]?>" alt="image">
<h4><?=$products[$artId-1]["artName"]?></h4>
<h5>Description :</h5>
<p><?= $products[$artId-1]["artDescription"]?></p>
<h4><?=$products[$artId-1]["artPrice"]?> $</h4>
<p>stock : <?=$products[$artId-1]["artStock"]?></p>

<form method="POST" action="?page=shop&artId=<?=$products[$artId-1]["idArticle"]?>&addedToCart=true ">
    <!-- déjà dans panier ? -->
    <?php
        if(isset($_SESSION['cart'])){
            if(isset($_SESSION['cart'])){
                
            }
        }
    ?>

    <label for="quantity">Quantity</label>

    <!-- si deja dans panier, indiquer la quantité -->
    <input value="1" type="number" id="quantity" name="quantity" min="1" max="<?=$products[$artId-1]["artStock"]?>"> 
    <!-- si déjà dans panier, message : cet article se trouve déjà dans votre panier ! -->
    <button class="btn btn-primary formButtonSubmit" name="article" type="submit" value="<?=$products[$artId-1]["idArticle"]?>">Ajouter au panier</button>
    
</form>
<?php ?>
</div>