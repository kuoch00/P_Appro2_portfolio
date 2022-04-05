
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : shop : page galerie où on consulte les articles
-->
<!-- https://getbootstrap.com/docs/4.4/components/card/  -->
<!-- afficher nom et prix et photo -->
<div class="container ">
   <div class="row">
      <?php
      foreach ($products as $product){?>
         <div class="col col-sm-6 col-md-3 ">
               <a href="?order=shop&artId=<?=$product["idArticle"]?>">
                  <div class="card">
                     <img class="img-card" src="resources/img-shop/<?=$product["artImage"]?>" alt="image">
                     <h4><?=$product["artName"]?></h4>
                     <div class="row">
                        <div class="col">
                           <p><?= $product['artStock']>0 ? "stock : ". $product['artStock'] : "out of stock" ?></p>
                        </div>
                        <div class="col-4">
                           <p style="text-align: right;"><?=$product["artPrice"]?> $</p>
                        </div>
                     </div>
                  </div> 
               </a>
         </div>
         
         <?php
      } ?>
 </div>  <!-- fin row -->

</div>