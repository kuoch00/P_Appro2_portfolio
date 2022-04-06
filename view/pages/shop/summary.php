
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où on consulte les détails d'un article
-->
<div class="container">

<!-- address -->
<div>
<h4>Sent to : </h4>
<p> 
<?php
echo $_POST['firstname'] . "<br> ";
echo $_POST['lastname'] . "<br> ";
echo $_POST['address']. "<br> ";
echo $_POST['addressComp']. "<br> ";
echo $_POST['postalCode']. "<br> ";
echo $_POST['city']. "<br> ";
echo $_POST['country']. "<br> ";
echo $_POST['state']. "<br> ";

echo $_POST['phoneNumber']. "<br> ";
echo $_POST['email']. "<br> ";

?>
    
</p>
</div>


<div>
<!-- tab articles + total + (shipping ? + total) -->
</div>

</div>