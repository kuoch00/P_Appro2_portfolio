
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où on consulte les détails d'un article
-->
<div class="container">

    <!-- address -->
    <div>
        <h4>Send to : </h4>
        <p> 
            <?php
            echo $_POST['firstname'] . " ";
            echo $_POST['lastname'] . "<br> ";
            echo $_POST['address']. "<br> ";
            echo $_POST['addressComp']. "<br> ";
            echo $_POST['postalCode']. " ";
            echo $_POST['city']. "<br> ";
            echo $_POST['state']. "<br> ";
            echo $_POST['country']. "<br> ";

            echo "Phone : " . $_POST['phoneNumber']. "<br> ";
            echo "Email : " . $_POST['email']. "<br> ";

            ?>
        </p>
    </div>


    <div>
    <!-- tab articles + total + (shipping ? + total) -->
        <?php
            include("view/pages/shop/basket.php");

        ?>

    </div>

</div>