
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page galerie où on consulte les articles
-->

<!-- afficher nom et prix et photo -->
<div class="container">
 <?php
 foreach ($products as $product){?>
 <div>
 <a href="?page=shop&artId=<?=$product["idArticle"]?>">
    <img src="/resources/img-shop/<?=$product["artImage"]?>" alt="image">
    <h4><?=$product["artName"]?></h4>
    <p><?=$product["artPrice"]?> $</p>
 </a>
    
 </div>

<?php
 } ?>
</div>