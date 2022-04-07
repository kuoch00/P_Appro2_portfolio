
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : header de la page (image avec menu de navigation)
-->

<header>
    <div>
        <!-- to center image children-->
        <div class="header-container"> 
            <div class="txt-img-container">
               <!-- to put gradient with img  -->
                <div class="header-img">
                    <div class="gradient-overlay">
                        <img class="header-img" src="resources/img/head2.png" alt="yay">
                    </div>
                </div>
                <h1 class="title ">Sarah Souffleur</h1>
            </div>
        </div>

            <!-- menu de navigation  -->
        <div>
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link 
                                <?= isset($_GET["page"])? ($_GET["page"]== "home" ? "active" : ""):"" ?> "
                                href="?page=home"
                                >About me 
                            </a>
                            
                            <!-- 
                                1. classe regarde si doit mettre en active ou non 
                                2. href va permettre au GET dans le controller de changer de page en changeant l'adresse
                            -->
                            
                            <!-- ne fonctionnne plus on met un case project pour projects et school  -->
                            <?php
                                $activeState;
                                if(isset($_GET['page'])){
                                    if($_GET['page']=="projects"){
                                        if(isset($_GET['catId'])){
                                            if($_GET['catId']!=1){
                                                $activeState = "active";
                                            }
                                            else{
                                                $activeState = "";
                                            }
                                        }
                                        else{
                                            $activeState = "active";
                                        }
                                    }
                                }

                            ?>

                            <a class="nav-item nav-link <?=$activeState?>" href="?page=projects">Projects</a>

                            <a class="nav-item nav-link <?= isset($_GET["page"]) ? ($_GET["page"]== "projects" && isset($_GET['catId']) && $_GET['catId']==1 ? "active" : ""):"" ?> " href="?page=projects&catId=1">School work</a>
                            <a class="nav-item nav-link <?= isset($_GET["order"])? ($_GET["order"]== "shop" ? "active" : ""):"" ?> " href="?order=shop">Shop</a>
                            <a class="nav-item nav-link <?= isset($_GET["page"])? ($_GET["page"]== "contact" ? "active" : ""):"" ?> " href="?page=contact">Contact</a>
                        </div>
                    </div>
                </div>
                
            </nav>
            <!-- <nav class="navbar navbar-light">

            </nav> -->
            <!-- nav -->
            <!-- login ici? -->
        </div>
    </div>
</header>