
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
         <div class="col-12 col-sm-6 col-md-4 col-lg-3 ms-0 mt-3">
               <a href="?order=shop&artId=<?=$product["idArticle"]?>">
                  <div class="card rounded h-100">
                     <div class="card-img-top;"style="width: 100%; height:70%; ">
                        <img class="rounded-top" style="width: 100%; height:100%; object-fit:cover;"  src="resources/img-shop/<?=$product["artImage"]?>" alt="image">
                     </div>
                     <div class="card-body">
                        <h4 class="mt-1"><?=$product["artName"]?></h4>
                        <div class="row">
                           <div class="col-sm">
                              <p><?= $product['artStock']>0 ? "stock : ". $product['artStock'] : "out of stock" ?></p>
                           </div> 
                           <div class="col-sm-5">
                              <p style="text-align: right;"><?=$product["artPrice"]?> $</p>
                           </div>
                        </div>
                     </div>
                     
                  </div> 
               </a>
         </div>
         
         <?php
      } ?>
 </div>  <!-- fin row -->

</div>