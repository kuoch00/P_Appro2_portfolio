
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où on consulte les détails d'un article
-->

<div class="container">
    <div class="container-background">
        <h1>Address</h1>

        <form method="post" action="?order=summary">
            <div class="row">    
                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="emailHelp" value="John"  required>
                </div>

                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="emailHelp" placeholder="Doe"  required>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="street"  required>
                </div>

                <div class="form-group col-sm">
                    <label for="exampleInputEmail1">Address complement</label>
                    <input type="text" class="form-control" id="addressComplement" name="addressComp" aria-describedby="emailHelp" placeholder="appt">
                </div>

            </div>
                

            <div class="row">
                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">Postal code</label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode" aria-describedby="emailHelp" placeholder="102581"  required>
                </div>

                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">City</label>
                    <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp" placeholder="City name" required>
                </div>
            </div>
            

            <div class="row">   
                
                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">Country</label>
                    <input type="text" class="form-control" id="country" name="country" aria-describedby="emailHelp" placeholder="Switzerland" required>
                    <!-- select country  -->
                </div>
                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">State</label>
                    <input type="text" class="form-control" id="state" name="state" aria-describedby="emailHelp" placeholder="Waadt"  required>
                </div> 
            </div>
            

            <div class="row">    
                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">Phone number</label>
                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" aria-describedby="emailHelp" placeholder="+41 000 000 00 00"  required>
                </div>

                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="example@email.com"  required>
                </div>
            </div>

            <div class="row">
                <h1>Tracking</h1>
            </div>
            <div class="row">
                <div class="form-group col">
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

            <button type="submit" class="btn btn-primary">Next</button>

            
        </form>

    </div>

</div>