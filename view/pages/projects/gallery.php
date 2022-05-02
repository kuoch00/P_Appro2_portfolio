
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
date de modification : 04.04.2022
description : page galerie où on consulte les oeuvres
images lues de gauche a droite dans ordre chronologique inversé (entrées les plus récentes en haut)
-->

<!-- DONE : 2/3  colonnes verticales avec largeur fixée -->
<!-- DONE : implementer modal view (js) -->
<div class="container">
  <a class="btn btn-primary" href="?page=projects" role="button"><i class="fa-solid fa-arrow-left"></i> go back</a>

  <!-- galerie -->
  <div class="row">
    <div class="col-sm-6"><!-- col 1 -->
      <?php
        $i=0;
        foreach($listGallery as $img){ 
          if($i%2==0){
            ?>
            <div class="col">
              <img class="gallery-width thumb" src="resources/img/<?=$img["imaFilename"]?>" alt="image" data-bs-toggle="modal" data-bs-target="#exampleModal">
            </div>
            <?php
          }
          $i++;
        } //fin foreach?>
    </div><!-- fin col 1 -->

    <div class="col-sm-6"><?php
      $i=0;
      foreach($listGallery as $img){
        if($i%2==1){?>
          <div class="col">
            <img class="gallery-width thumb" src="resources/img/<?=$img["imaFilename"]?>" alt="image" data-bs-toggle="modal" data-bs-target="#exampleModal">
          </div>
          <?php
        }
        $i++;
      }?>
    </div>  <!-- fin col2 -->
  </div><!-- fin row -->

  <!-- Modal : permet d'avoir un apercu de l'image en plus grand-->
  <!-- source : https://stackoverflow.com/a/71326915 -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body">
          <div class="item"><img id="modalImage" class="img-fluid" /></div>
          <!-- <button type="button" class="btn-close btn-close-white" aria-label="Close"></button> -->
        </div>
      </div>
    </div>
  </div>
  
      <?php
      
      ?>

  <!-- https://getbootstrap.com/docs/4.1/components/modal/#varying-modal-content

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
        <div class="modal-body">
          <img src="" alt="">
        </div>
        
      </div>
    </div>
  </div> -->

</div>
