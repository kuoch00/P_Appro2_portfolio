
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où on remplit son addresse
-->

<div class="container">
    <div class="container-background">
        
        <!-- if address already exists : display here -->
        <!-- if radio button not on here, disable -->
        <!-- http://jsfiddle.net/8NynQ/ -->
        <?php
        $update = false;
        $order = false;
        //si lors du processus d'achat
        if ($_GET['order']=="shipping"){
            $order = true;
            ?>
            <h1>Address information</h1>
            <form method="post" action="?order=summary">
            
            <?php
        }
        //si depuis page compte client
        else if($_GET['order']=="account"){
            //changement d'adresse
            if($_GET['option']=='updateAddress'){
                $update = true;
                ?>
                <h1>Update address information</h1>
                
                <?php
            }
            else if($_GET['option'] == "addAddress"){?>
                <h1>Add address information</h1>  
                <?php
            }
            
            ?>
            <form method="post" action="?order=account&option=updatingAddress">
<!--             
            <form method="post" action="?order=account"> -->
            <?php //+ message update réussi?
        }

        ?>
        
        
            <!-- <label for="radio1">        
                <input type="radio" name="test" value="oldAddress">
                radio 1
            </label>
            <label for="radio2">        
                <input type="radio" name="test" value="newAddress">
                radio 2
            </label>
            -->

            <!-- affichage addresse existante -->
            <?php
                //si une addresse existe
                if($order){ 
                    if($userInfo[0]['cliAddress']!=null){
                        //donner le choix d'utiliser l'adresse existante ou de la modifier (pas de possiblité d'enregistrer plusieurs adresses pour l'instant)
                        $update = true;
                        ?>
                        <label for="useSaved">
                            <input class="form-check-input" type="radio" id="useSaved" name="useSavedAddress" checked="checked"> Use saved address :
                        </label> 
                        <!-- si oui : show this -->
                        <ul class="no-bullets">
                            <li><?=$_SESSION['userinfo'][0]['cliFirstName'] . " " . $_SESSION['userinfo'][0]['cliLastName']?></li>
                            <li><?=$_SESSION['userinfo'][0]['cliAddress']?></li>
                            <li><?=$_SESSION['userinfo'][0]['cliPostalCode'] . " " . $_SESSION['userinfo'][0]['cliCity']?></li>
                            <li><?=$_SESSION['userinfo'][0]['cliState']?></li>
                            <li><?=$_SESSION['userinfo'][0]['cliCountry']?></li><br>
                            <li>Phone : <?=$_SESSION['userinfo'][0]['cliPhoneNumber']?></li>
                            <li>Email : <?=$_SESSION['userinfo'][0]['cliEmailAddress']?></li>
                        </ul>
                        <label for="notUseSaved">
                            <input class="form-check-input" type="radio" id="notUseSaved" name="useSavedAddress" > Update address information
                        </label>
                        <div id="showForms" style="display: none;">
                        
                        <?php
                    }
                }
            ?>
            <div>
                <div class="row">    
                    <div class="form-group col-sm">
                        <!-- bootstrap verifie la forme de l'adresse !! :D -->
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="emailHelp" value="<?= $update ? $userInfo[0]['cliFirstName'] : "" ?>"  required>
                    </div>

                    <div class="form-group col-sm">
                        <!-- bootstrap verifie la forme de l'adresse !! :D -->
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="emailHelp" placeholder="Doe" value="<?= $update ? $userInfo[0]['cliLastName'] : "" ?>"  required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="street" value="<?= $update ? $userInfo[0]['cliAddress'] : "" ?>" required>
                    </div>

                    <!-- <div class="form-group col-sm">
                        <label for="exampleInputEmail1">Address complement</label>
                        <input type="text" class="form-control" id="addressComplement" name="addressComp" aria-describedby="emailHelp" placeholder="appt" value="">
                    </div> -->

                </div>
                    

                <div class="row">
                    <div class="form-group col-sm">
                        <label for="exampleInputEmail1">Postal code</label>
                        <input type="text" class="form-control" id="postalCode" name="postalCode" aria-describedby="emailHelp" placeholder="102581" value="<?= $update ? $userInfo[0]['cliPostalCode'] : "" ?>" required>
                    </div>

                    <div class="form-group col-sm">
                        <label for="exampleInputEmail1">City</label>
                        <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp" placeholder="City name" value="<?= $update ? $userInfo[0]['cliCity'] : "" ?>" required>
                    </div>
                </div>
                

                <div class="row">   
                    
                    <div class="form-group col-sm">
                        <label for="exampleInputEmail1">Country</label>
                        <input type="text" class="form-control" id="country" name="country" aria-describedby="emailHelp" placeholder="Switzerland" value="<?= $update ? $userInfo[0]['cliCountry'] : "" ?>" required>
                        <!-- select country  -->
                    </div>
                    <div class="form-group col-sm">
                        <label for="exampleInputEmail1">State</label>
                        <input type="text" class="form-control" id="state" name="state" aria-describedby="emailHelp" placeholder="Waadt" value="<?= $update ? $userInfo[0]['cliState'] : "" ?>"  required>
                    </div> 
                </div>
                

                <div class="row">    
                    <div class="form-group col-sm">
                        <label for="exampleInputEmail1">Phone number</label>
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" aria-describedby="emailHelp" placeholder="+41 000 000 00 00" value="<?= $update ? $userInfo[0]['cliPhoneNumber'] : "" ?>"  required>
                    </div>

                    <!-- <div class="form-group col-sm">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="example@email.com"   required>
                    </div> -->
                </div>

            </div>
            
            
            <?php
            if($order){ ?> 
                <?php
                if($userInfo[0]['cliAddress']!=null){
                    ?>
                        </div><!-- fin div display none -->
                        <br><br>
                    <?php
                }
                ?>

               
                <div class="row">
                    <h1>Tracking</h1>
                </div>
                <div class="row">
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioShipping" id="flexRadioDefault1"  value="0" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                No tracking
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioShipping" id="flexRadioDefault2" value="7">
                            <label class="form-check-label" for="flexRadioDefault2">
                                With tracking (+7$)
                            </label>
                        </div>
                    </div> 
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary col-3  ">Next</button>
                </div>
                </div> 
                <?php
            }
            else{ //= update/add address
                ?>
                <div class="d-flex justify-content-end">
                    <div>
                        <a class="btn btn-secondary" href="?order=account" role="button">Cancel</a> 
                        <button type="submit" class="btn btn-primary"><?= $update ? "Update" : "Add address" ?></button>
                    </div>
                </div>
                <?php
            }
            ?>
            
        <!-- </fieldset> --> 
        </form> 
    </div> 
</div>