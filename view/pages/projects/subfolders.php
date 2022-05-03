
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
<!-- <div style="background: url('resources/img/treasuremap.jpg')  no-repeat center fixed ; background-size: cover;  ">
</div> -->
<div class="container ">
<!-- style="background-image: url('resources/img/treasuremap.jpg');" -->
    
    <?php
        if($_GET["catId"]>1){?>
            <a class="btn btn-primary" href="?page=projects" role="button"><i class="fa-solid fa-arrow-left"></i> go back</a>
        <?php
        } 
    ?>
    <h2><?=$projectInfo[0]["catName"]?></h2>
    <p><?=$projectInfo[0]["catDescription"]?></p>

    <?php
        //all
        ?>
        <div class = "container-item container-center"> 
            <?php $catId = $_GET['catId'] ?>
            <a class="container-center" href="?page=projects&catId=<?=$catId?>&subcatId=all">
            <!-- id du projet + id du subfolder -->
            <!-- img derniere image ajoutée -->
                <img class="cat-cover" src="resources/img/2.png" alt="image">
                <h3>All</h3>
            </a> 
        </div>
        <?php

        //liste des sous cat
        foreach ($listSubcategories as $subcategory){?>
            <div class = "container-item container-center">
            <!-- id subcat?  -->
                <a class="container-center" href="?page=projects&catId=<?= $subcategory["idCategory"]?>&subcatId=<?=$subcategory["idSubCategory"]?>">
                <!-- id du projet + id du subfolder -->
                <!-- img derniere image ajoutée -->
                    <img class="cat-cover" src="resources/img/2.png" alt="image">
                    <h3><?= $subcategory["subName"]?></h3>
                </a> 
            </div>

    <?php } ?>
    
    
    
    
</div>

