<!-- 
auteur : Elisa Kuoch
date de création : 12.04.2022
date de modification : 12.04.2022
description : page ou le client peut voir son addresse enregistrée, les modifier et voir ses commandes?
 -->
<?php //connected
if(isset($_SESSION["connected"]) && $_SESSION["connected"]){?>
    <div class="container">
        <h1>My account</h1>

        <div>
            <h3>My address</h3>
            <a class="btn btn-primary" href="?order=changeAddress" role="button">Update informations</a>
        </div>

        <div>
            <h3>My orders</h3>
            <!-- tab avec dernières commandes et leur état ? (delivered, finished, etc)-->
        </div>

    </div>

<?php
}
else{//not connected
    include("view/pages/shop/notConnected.php");
}
?>
 