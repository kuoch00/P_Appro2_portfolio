
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où les sujets du projet sont présentés
-->




<!-- 
titre du projet
presente le projet brièvement 

liste les sujets du projet (bd)

-->
<div class="container">
    <?php
        foreach ($listSubcategories as $subcategory){?>
            <div class = "container-item container-center">
                <a class="container-center" href=" ">
                    <img class="img-full" src="" alt="">
                    <h3><?= $subcategory["subName"]?></h3>
                </a> 
            </div>

    <?php } ?>
    
    
    
    
</div>

