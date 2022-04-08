
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où le client se connecte afin de recuprerer ses données
-->

<div class="container">
    <div class="">
        <div class="d-flex justify-content-center">
            <div class="col-8 container-background ">
                <form method="POST" action="?order=login&check=0">
                    <h1>Login</h1>
                    <div class="form-group">
                        <!-- bootstrap verifie la forme de l'adresse !! :D -->
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control <?= !isset($_POST["connected"])==0 ? "is-invalid" : ""?>" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter email" value= <?= isset($_POST['username'])!="" ? $_POST["username"] : "" ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control <?= !isset($_POST["connected"])==0 ? "is-invalid" : ""?>" id="exampleInputPassword1" name="password" placeholder="Password">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            Email address not found or wrong password.
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary col d-flex justify-content-center">Login</button>
                    </div>
                </form>
            </div>
            
        </div>
        

    </div>

</div>