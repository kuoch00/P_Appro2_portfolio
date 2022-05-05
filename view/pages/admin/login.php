<div class="container"> 
    <div class="d-flex justify-content-center">
        <div class="col-8 container-background mt-3">
            <form method="POST" action="?admin=login">
                <h1>Admin</h1>
                <div class="form-group row">
                    <!-- bootstrap verifie la forme de l'adresse !! :D -->
                    <label for="username">Username</label>
                    <input type="text" class="form-control <?= isset($isInvalid) && $isInvalid==true ? "is-invalid" : ""?>" id="exampleInputEmail1" name="username" aria-describedby="emailHelp"  value= <?= isset($_POST['username'])!="" ? $_POST["username"] : "" ?>>
                </div>
                <div class="form-group row">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control <?= isset($isInvalid) && $isInvalid==true ? "is-invalid" : ""?>" id="exampleInputPassword1" name="password" > 
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Username not found or wrong password.
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" onclick="togglePassword()"> Show Password 
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary col d-flex justify-content-center">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>