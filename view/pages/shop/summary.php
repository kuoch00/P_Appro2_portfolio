
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
                //se redéfinit si on revient en arriere et on change ou pas
                $_SESSION['address'] = array(
                    'firstname' => $_POST['firstname'],
                    'lastname'=>$_POST['lastname'],
                    'address'=>$_POST['address'],
                    'postalCode'=>$_POST['postalCode'],
                    'city'=>$_POST['city'],
                    'state'=>$_POST['state'],
                    'country'=>$_POST['country'],
                    'phoneNumber' => $_POST['phoneNumber'],
                    'emailAddress' => $userInfo[0]['cliEmailAddress']
                );

                echo $_SESSION['address']['firstname'] . " ";
                echo $_SESSION['address']['lastname'] . "<br>";
                echo $_SESSION['address']['address'] . "<br>";
                echo $_SESSION['address']['postalCode'] . " ";
                echo $_SESSION['address']['city'] . "<br>";
                echo $_SESSION['address']['state'] . "<br>";
                echo $_SESSION['address']['country'] . "<br><br>";

                echo "Phone : " . $_SESSION['address']['phoneNumber']. "<br> ";
                echo "Email : " . $_SESSION['address']['emailAddress']. "<br> ";

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
