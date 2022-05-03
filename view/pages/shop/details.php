<?php

?>

<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où on consulte les détails d'un article
-->

<div class="container">
<?php ?>
<a class="btn btn-primary" role="button" href="?order=shop">
<i class="fa-solid fa-arrow-left"></i>
 retour</a><br>
<div class="row">
<?php
    if(isset($_SESSION['cart'])){
        $id = $_GET['artId'];
        foreach($_SESSION['cart'] as $row){
            if($id == $row['artId']){
                ?>
                <div class="alert alert-success" role="alert">
                    This item is already in your cart ! 
                </div>
                <?php
            }
        }
    }
?>
</div>
<div class="row">
    <div class="col-sm-4">
        <img class="img-detail" src="resources/img-shop/<?=$products[$artId-1]["artImage"]?>" alt="image">
    </div>
    <div class="col-sm">
        <div class="row" >    
            <h4><?=$products[$artId-1]["artName"]?></h4>
            <h4><?=$products[$artId-1]["artPrice"]?> $</h4>
            

        </div>
        <div class="row">
            <p>stock : <?=$products[$artId-1]["artStock"]?></p>
        </div>
       

        <div class="row align-items-end" >
            <form method="POST" action="?order=shop&artId=<?=$products[$artId-1]["idArticle"]?>&addedToCart=true ">
                <!-- déjà dans panier ? -->
                
                <label for="quantity">Quantity </label>

                <!-- si deja dans panier, indiquer la quantité -->
                <input value="<?= isset($row['artQuantity']) ? $row['artQuantity'] : "1"  ?>" type="number" id="quantity" name="quantity" min="1" max="<?=$products[$artId-1]["artStock"]?>" style="width: 5em;"> 
                    <div class="d-flex justify-content-end">
                <!-- si n'est plus en stock : disable le bouton -->
                <br><button class="btn btn-primary formButtonSubmit" name="article" type="submit" value="<?=$products[$artId-1]["idArticle"]?>" <?=$products[$artId-1]['artStock']==0 ? "disabled" : ""?>>Ajouter au panier</button>
                </div>
            </form>
        </div>
        
    </div>

</div>
<div class="row">
<h4>Description :</h4>
    <p><?= $products[$artId-1]["artDescription"]?></p>
</div>



<?php ?>
</div>