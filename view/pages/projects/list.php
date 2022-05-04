
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page liste où tous les projets sont présentés
-->



<!-- liste tous les projets existants avec image de couverture et nom en dessous-->
<div class="container ">
    <?php
        foreach ($listProjects as $project){?>
        <!-- affichage d'un projet  -->
            <div class="container-item container-center">
                <!-- va a case project et on pourra aller ensuite dans catId  -->
                <a class="container-center" href="?page=projects&catId=<?=$project["idCategory"]?>">

                    <!-- affiche l'image  -->
                    <div class="ratio ratio-21x9 mt-3">
                        <img class="cat-cover"  src="resources/img/<?=$project["catImage"]?>" alt="image">
                    </div>

                    <!-- affiche le nom du projet  -->
                    <h3><?= $project["catName"] ?></h3>
                </a>
            </div>
        <?php }
    ?>
</div>
