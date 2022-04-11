
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
date de modification : 11.04.2022
description : page où le client peut créer un compte (si adresse email pas encore utilisée)
si le temps le permet : ajouter regex pour verifier adresse (no bootstrap le fait tt seul)
 -->

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-8 container-background">
            <h1>Create Account</h1>
            
            
            <form action="?order=createAccount" method="post">
                <div class="form-group row">
                    <label for="exampleFormControlInput1">E-mail address</label>
                    <input type="email" class="form-control <?= (isset($isInvalid) && $isInvalid=="true") ? "is-invalid" : ""?>" id="EMAIL" name="email" placeholder="Enter email address"  required>
                    <?php 
                    var_dump($isInvalid);
                    ?>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        An existing account already uses this email address. Please use another one.
                    </div> 
                </div> 

                <div class="form-group row">
                    <label for="exampleFormControlInput1">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" required>
                </div>

                <div class="form-group row">
                    <label for="exampleFormControlInput1">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary col d-flex justify-content-center">Create account</button>
                </div>
            </form>
        </div>        
    </div>
    

</div>
