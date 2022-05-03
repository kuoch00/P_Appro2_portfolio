
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
                    <input type="email" class="form-control <?= (isset($isInvalid) && $isInvalid) ? "is-invalid" : ""?>" id="EMAIL" name="email" placeholder="Enter email address"  required>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        This e-mail address is already used by an existing account. Please use another one.
                    </div> 
                </div> 

                <div class="form-group row">
                    <label for="exampleFormControlInput1">
                        Password
                    </label>
                    <input type="password" id="password" class="form-control"  name="password" placeholder="Enter Password" required>
                </div>

                <div class="form-group ">
                    <input class="form-check-input" type="checkbox" onclick="togglePassword()"> Show Password 
                </div>

                <div class="form-group row">
                    <label for="exampleFormControlInput1">
                        Confirm Password
                    </label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary col d-flex justify-content-center">Create account</button>
                </div>

                <p class="text-center">Already have an account ? <a class="underline" href="?order=login">Login</a></p>
            </form>
        </div>        
    </div>
    

</div>
