
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page où le client se connecte afin de recuprerer ses données
-->

<div class="container">
    <div class="container-background">
        <h1>Login</h1>
        <form method="POST" action="?order=login&check=0">
            <div class="form-group">
                <!-- bootstrap verifie la forme de l'adresse !! :D -->
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

</div>