
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où on consulte les détails d'un article
-->
<?php
//is connected
if(isset($_SESSION["connected"])){
?>
    <div class="container">
        <h1>Order Summary</h1>
        <!-- address -->
        <div>
            <h4>Send to : </h4>
            <p> 
                <?php
                echo $_POST['firstname'] . " ";
                echo $_POST['lastname'] . "<br> ";
                echo $_POST['address']. "<br> ";
                echo $_POST['postalCode']. " ";
                echo $_POST['city']. "<br> ";
                echo $_POST['state']. "<br> ";
                echo $_POST['country']. "<br> ";

                echo "Phone : " . $_POST['phoneNumber']. "<br> ";
                echo "Email : " . $userInfo[0]['cliEmailAddress']. "<br> ";

                //check val shipping tracking
                
                ?>
            </p>
        </div>


        <div>
        <!-- tab articles + total + (shipping ? + total) -->
        <!-- $trackingFee = -->
            <?php
                $trackingFee = $_POST["radioShipping"];
                include("view/pages/shop/arrayCart.php");

            ?>
        </div>

        <div>
            <a class="btn btn-primary" href="?order=confirm" role="button">Finish order</a>

        </div>

    </div>

<?php    
}

else{//not connected
    
    include("view/pages/shop/notConnected.php");
}
?>
