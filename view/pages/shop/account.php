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
            <p>username/email address : <?=$_SESSION['userinfo'][0]['cliEmailAddress']?></p>
        <div>
            <h3>My address</h3>
            <?php
                if($_SESSION['userinfo'][0]['cliFirstName'] == null){
                    ?>
                    <p>No saved address</p>
                    <a class="btn btn-primary" href="?order=account&option=addAddress" role="button">Add an address</a>

                    <?php
                }
                else{ ?>
                    <ul class="no-bullets">
                        <li><?=$_SESSION['userinfo'][0]['cliFirstName'] . " " . $_SESSION['userinfo'][0]['cliLastName']?></li>
                        <li><?=$_SESSION['userinfo'][0]['cliAddress']?></li>
                        <li><?=$_SESSION['userinfo'][0]['cliPostalCode'] . " " . $_SESSION['userinfo'][0]['cliCity']?></li>
                        <li><?=$_SESSION['userinfo'][0]['cliState']?></li>
                        <li><?=$_SESSION['userinfo'][0]['cliCountry']?></li><br>
                        <li><?=$_SESSION['userinfo'][0]['cliPhoneNumber']?></li>
                        <li><?=$_SESSION['userinfo'][0]['cliEmailAddress']?></li>
                    </ul>
                    <a class="btn btn-primary" href="?order=account&option=updateAddress" role="button">Update informations</a>

                    <?php
                } ?>
            
            
            
            
            
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
 