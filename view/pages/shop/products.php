
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page galerie où on consulte les articles
-->
<!-- https://getbootstrap.com/docs/4.4/components/card/  -->
<!-- afficher nom et prix et photo -->
<div class="container ">
   <div class="container-flex row">

   <?php
   
   foreach ($products as $product){?>

        
            <div class="card col-sm-4" > 
               <a href="?order=shop&artId=<?=$product["idArticle"]?>">
                  <img class="img-card" src="resources/img-shop/<?=$product["artImage"]?>" alt="image">
                  <h4><?=$product["artName"]?></h4>
                  <p><?=$product["artPrice"]?> $</p> 
               </a>
            </div>
         
      <?php
   } ?>
 </div>
</div>