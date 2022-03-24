
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page liste où tous les projets sont présentés
-->



<!-- liste tous les projets existants avec image de couverture et nom en dessous-->
<div class="container">
    <?php
        foreach ($list_projects as $project){?>
        <!-- affichage d'un projet  -->
            <div class="container-item">
                <!-- va a case gallery et on pourra aller ensuite dans catId  -->
                <a href="?page=projects&catId=<?=$category["idCategory"]?>">

                    <!-- affiche l'image  -->
                    <img src="/resources/img/<?= $category["catImage"]?>" alt="image">

                    <!-- affiche le nom du projet  -->
                    <h3><?= $category["catName"] ?></h3>
                </a>
            </div>
        <?php }
    ?>
</div>
