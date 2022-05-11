
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
<div class="container mt-3">
<?php
        if($_GET["catId"]>1){?>
            <a class="btn btn-primary" href="?page=projects" role="button"><i class="fa-solid fa-arrow-left"></i> go back</a>
        <?php
        } 
    ?>
<!-- style="background-image: url('resources/img/treasuremap.jpg');" -->
    <div class="row">
    
    <h2><?=$projectInfo[0]["catName"]?></h2>
    <p><?=$projectInfo[0]["catDescription"]?></p>

    <?php
        //all
        ?>
        <div class = "container-item col-md-6"> 
            <?php $catId = $_GET['catId'] ?>
            <a class="" href="?page=projects&catId=<?=$catId?>&subcatId=all">
            <!-- id du projet + id du subfolder -->
            <!-- img derniere image ajoutée -->
                <div class="ratio ratio-21x9 carousel-fade " style="background-color: var(--secondbg-color)">
                    <?php
                        // print_r($subcatAllArray);
                        // die();
                        foreach($subcatAllArray as $image){?>
                            <img class="cat-cover mySlides" src="resources/img/<?= $image['imaFilename']?>" alt="<?=$image['imaFilename']?>">
                            <?php
                        }
                    ?>
                    <!-- <img class="cat-cover" src="resources/img/<?= $subcatAllArray[0]['imaFilename']?>" alt="<?=$subcatAllArray[0]['imaFilename']?>"> -->
                </div>
                <h3 class="text-center">All</h3>
            </a> 
        </div>
        <?php

        //liste des sous cat
        foreach ($listSubcategories as $subcategory){?>
            <div class = "container-item col-md-6">
            <!-- id subcat?  -->
                <a class="" href="?page=projects&catId=<?= $subcategory["idCategory"]?>&subcatId=<?=$subcategory["idSubCategory"]?>">
                <!-- id du projet + id du subfolder -->
                <!-- img derniere image ajoutée -->
                    <?php
                    foreach($listSubcatImages as $subcatImage){
                        if($subcatImage['idSubCategory']==$subcategory['idSubCategory']){
                            ?>
                                <div class="ratio ratio-21x9 " style="background-color: var(--secondbg-color);
" > 
                                    <img class="cat-cover" src="resources/img/<?=$subcatImage['imaFilename']?>" alt="<?=$subcatImage['imaFilename']?>">
                                </div>
                            <?php 
                        }
                    }
                    ?>
                    
                    
                    <h3 class="text-center"><?= $subcategory["subName"]?></h3>
                </a> 
            </div>

    <?php } ?>
    </div>
    
    
    
    

</script>
</div>

