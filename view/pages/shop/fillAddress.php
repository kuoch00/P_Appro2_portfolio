
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où on consulte les détails d'un article
-->

<div class="container">
    <div class="container-background">
        <h1>Address</h1>

        <form method="post" action="?order=shipping&summary=0">
            <div class="row">    
                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="John">
                </div>

                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Doe">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="email" class="form-control" id="address" aria-describedby="emailHelp" placeholder="street">
                </div>

                <div class="form-group col-sm">
                    <label for="exampleInputEmail1">Address complement</label>
                    <input type="email" class="form-control" id="addressComplement" aria-describedby="emailHelp" placeholder="appt">
                </div>

            </div>
                

            <div class="row">
                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">Postal code</label>
                    <input type="email" class="form-control" id="postalCode" aria-describedby="emailHelp" placeholder="102581">
                </div>

                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">City</label>
                    <input type="email" class="form-control" id="city" aria-describedby="emailHelp" placeholder="City name">
                </div>
            </div>
            

            <div class="row">   
                
                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">Country</label>
                    <input type="email" class="form-control" id="country" aria-describedby="emailHelp" placeholder="Switzerland">
                </div>
                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">State</label>
                    <input type="email" class="form-control" id="state" aria-describedby="emailHelp" placeholder="Waadt">
                </div> 
            </div>
            

            <div class="row">    
                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">Phone number</label>
                    <input type="email" class="form-control" id="phone number" aria-describedby="emailHelp" placeholder="+41 000 000 00 00">
                </div>

                <div class="form-group col-sm">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="example@email.com">
                </div>
            </div>

            <div class="row">
                <h1>Tracking</h1>
            </div>

            
            <div class="row">
                <div class="form-group col">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            No tracking
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
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