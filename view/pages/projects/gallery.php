
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

    foreach($listGallery as $img){ 
        // if($img["idImage"]%2==1){
        //     echo $img["idImage"];
        // }
        ?>
            <img class="gallery-width" src="resources/img/<?=$img["imaFilename"]?>" alt="image" data-toggle="modal" data-target=".bd-example-modal-xl">

            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->

            

        <?php
        } ?>
        
<!-- modal -->
            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <!-- conntent -->
                    <div class="modal-content">
                        <img src="resources/img/<?=$img["imaFilename"]?>" alt="Cannot show image">
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
