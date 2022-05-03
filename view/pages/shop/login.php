
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où le client se connecte afin de recuprerer ses données
-->

<div class="container">
    
    <div class="d-flex justify-content-center">
        <div class="col-8 container-background ">
            <form method="POST" action="?order=login">
                <h1>Login</h1>
                <div class="form-group row">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control <?= isset($isInvalid) && $isInvalid==true ? "is-invalid" : ""?>" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter email" value= <?= isset($_POST['username'])!="" ? $_POST["username"] : "" ?>>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" id="MyPassword" class="form-control <?= isset($isInvalid) && $isInvalid==true ? "is-invalid" : ""?>" id="exampleInputPassword1" name="password" placeholder="Password">
                   
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Email address not found or wrong password.
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" onclick="togglePassword()"> Show Password 
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary col d-flex justify-content-center">Login</button>
                </div>
            </form>
            <p class="text-center">Don't have an account yet ? <a href="?order=createAccount" class="link"> Create one now !</a></p>  
        </div>
        
    </div>
        

  

</div>