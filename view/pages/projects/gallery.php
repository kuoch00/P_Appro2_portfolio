
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page galerie où on consulte les oeuvres
-->

<!-- 
titre du projet
presente le projet brièvement  -->

<!-- 2/3  colonnes verticales avec largeur fixée -->

<!-- implementer modal view (js) -->
<div class="container">
<a href="?page=projects&catId=<?=$listGallery[0]["idCategory"]?>">go back</a>
<?php

//affiche la galerie
    foreach($listGallery as $img){ 
        // if($img["idImage"]%2==1){
        //     echo $img["idImage"];
        // }
        ?>
            <img class="gallery-width" src="resources/img/<?=$img["imaFilename"]?>" alt="image" data-bs-toggle="modal" data-bs-target="#exampleModal">

            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->

            

        <?php
        } ?>
        <!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-body">
        <div class="item"><img id="modalImage" class="img-fluid" /></div>
      </div>
    </div>
  </div>
</div>
    <?php
    
    ?>







<!-- https://getbootstrap.com/docs/4.1/components/modal/#varying-modal-content -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <img src="" alt="">
      </div>
      
    </div>
  </div>
</div>













</div>
