
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
    <h2><?=$projectInfo[0]["catName"]?></h2>
    <p><?=$projectInfo[0]["catDescription"]?></p>
    <?php
        foreach ($listSubcategories as $subcategory){?>
            <div class = "container-item container-center">
            <!-- id subcat?  -->
                <a class="container-center" href="?page=projects&catId=<?= $subcategory["idCategory"]?>&subcatId=<?=$subcategory["idSubCategory"]?>">
                <!-- id du projet + id du subfolder -->
                <!-- img derniere image ajoutée -->
                    <img class="img-full" src="" alt="image">
                    <h3><?= $subcategory["subName"]?></h3>
                </a> 
            </div>

    <?php } ?>
    
    
    
    
</div>

