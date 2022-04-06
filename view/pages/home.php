
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page index/home où l'artiste est présentée
-->

<!-- faire flex son contenu  -->
<!-- faire un media query pour celui là peut etre à cause de la photo  -->
<div class="container container-item"> 
    <h2>The Artist</h2>
    <div class="row">
        <div class=" col-xl-3 d-flex justify-content-center">
            <img class="img-fluid " src="./resources/img/photo.png" alt="">
        </div>

        <div class="col">
            <h2> Sarah Souffleur </h2>
            <p class="artistDescription">
                Qu'est-ce que le Lorem Ipsum?
                Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
            </p>
        </div>
    </div>
</div>

<div class="container container-item">
    
    <h2>Projects</h2>
    <div class="d-flex justify-content-center">
        <div class="container-mini">
            <!-- slider ? -->
            <!-- http://sachinchoolur.github.io/lightslider/ -->

            <!-- carousel 
            source : https://getbootstrap.com/docs/4.3/components/carousel/#individual-carousel-item-interval
            -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <!-- petits carrés en bas -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <!-- foreach ici -->
                    <?php
                    $numberProjects = count($listProjects); //=2

                    for ($i=0; $i < $numberProjects-1 ; $i++) { 
                        ?>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to= <?= $i + 1?> aria-label="slide 2"></button>
                        <?php
                    }
                    ?>
                    
                    <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                </div>
                <!-- images -->
                <div class="carousel-inner">
                    
                    <!-- foreach ici -->
                    <?php
                    foreach($listProjects as $project){
                        if($project['idCategory'] == 2){?>
                            <div class="carousel-item active">
                                <img src="resources/img/<?=$project['catImage']?>" class="d-block w-100" alt="1">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?=$project['catName']?></h5>
                                </div>
                            </div>
                            <?php
                        }
                        else{?>
                            <div class="carousel-item">
                                <img src="resources/img/<?=$project['catImage']?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?=$project['catName']?></h5>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    
                    ?>

                </div>  
            
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

                

            

<div class="container container-item ">
    <div>
        <h2>Skills</h2>
        <div class="d-flex justify-content-center">
            <div class="container-mini">
                <div class="row ">
                    <div class="col-sm skillsbox">
                        <img src="" alt="">
                        <h4 class="skillsbox-text">Illustration</h4>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-sm skillsbox">
                        <img src="" alt="">
                        <h4 class="skillsbox-text">Character design</h4>
                    </div>
                    <div class="col-sm skillsbox ">
                        <img src="" alt="">
                        
                        <h4 class="skillsbox-text">Environment design</h4>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm  skillsbox">
                        <img src="" alt="">
                        
                        <h4 class="skillsbox-text">Storyboard</h4>
                    </div>
                    <div class="col-sm  skillsbox">
                        <img src="" alt="">
                        <h4 class="skillsbox-text">Character Model Sheet</h4>
                    </div>
                    <div class="col-sm skillsbox">
                        <img src="" alt="">
                        <h4 class="skillsbox-text">Layout</h4>
                    </div>
                </div>
                <div class=" row ">
                    <div class="col-sm skillsbox">
                        <img src="" alt=""> 
                        <h4 class="skillsbox-text">Traditional drawing</h4>
                    </div>
                </div>

            </div>
            
        </div>
        



    </div>
</div>

<!-- mettre dans grid row col  -->
<div class="container container-item">
    <div>
        <h2>Programs</h2>
        
        <div class="container-flex container-center  row">
            <div class="container-mini container-flex-programs row">
                <div class="container-program col">
                    <img class="img-program" src="resources/img/home/clipstudiopaint-icon.png" alt="">
                    <h5>Clip Studio Paint Pro</h5>
                </div>

                <div class="container-program col">
                    <img class="img-program" src="resources/img/home/photoshop-icon.png" alt="">
                    <h5>Adobe Photoshop</h5>
                </div>

                <div class="container-program col">
                    <img class="img-program" src="resources/img/home/procreate-icon.png" alt="">
                    <h5>Procreate</h5>
                </div>
                
            </div>
        </div>



    </div>
</div>