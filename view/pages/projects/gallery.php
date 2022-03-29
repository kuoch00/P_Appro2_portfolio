
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
            <img class="gallery-width" src="resources/img/<?=$img["imaFilename"]?>" alt="image">
        <?php
        } ?>
        


    <?php
    
    ?>

</div>
