
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page galerie où on consulte les articles
-->
<!-- https://getbootstrap.com/docs/4.4/components/card/  -->
<!-- afficher nom et prix et photo -->
<div class="container ">
   <div class=" row row-cols-sm-3">

   <?php
   foreach ($products as $product){?>
      <div class="col">
            <a href="?order=shop&artId=<?=$product["idArticle"]?>">
               <div class="card">
                  <img class="img-card" src="resources/img-shop/<?=$product["artImage"]?>" alt="image">
                  <h4><?=$product["artName"]?></h4>
                  <p class="text-right"><?=$product["artPrice"]?> $</p> 
               </div>
            </a>
      </div>
      
      <?php
   } ?>
 </div>  <!-- fin row -->

</div>