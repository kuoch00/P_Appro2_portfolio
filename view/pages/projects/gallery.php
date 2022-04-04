
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page galerie où on consulte les oeuvres
-->

<!-- 
titre du projet
presente le projet brièvement  -->

<!-- DONE : 2/3  colonnes verticales avec largeur fixée -->

<!-- DONE : implementer modal view (js) -->
<div class="container">
<a class="btn btn-primary" href="?page=projects" role="button"><- go back</a>

<?php

  $i=0;
        foreach($listGallery as $img){ 
          if($i%2==0){
            ?>
            <!-- new row -->
            <div class= "row">
              <div class="col">
                <img class="gallery-width thumb" src="resources/img/<?=$img["imaFilename"]?>" alt="image" data-bs-toggle="modal" data-bs-target="#exampleModal">
              </div><!-- fin col -->
            <?php
          }
          else{
            ?>
              <div class= col>
                <img class="gallery-width thumb" src="resources/img/<?=$img["imaFilename"]?>" alt="image" data-bs-toggle="modal" data-bs-target="#exampleModal">
              </div> <!-- fin col -->
            </div> <!-- fin row -->
            
            <?php
          }
          $i++;
          ?>
        
        <?php } //fin foreach


// fin foreach 

if($i%2==1){
  ?>
  <div class=col>
    <p></p>
  </div>
  </div>
  <?php
      ?>

      <?php
}
      ?> 
      


<!-- Modal -->
<!-- source : https://stackoverflow.com/a/71326915 -->
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
