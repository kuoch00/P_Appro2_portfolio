<div class="container">
    <nav class="mt-2">
        <ul class="nav justify-content-end mb-3">
            
            <li class="nav-item">
                <a class="d-flex" href="?order=checkout">
                    <i class="fa-solid fa-cart-shopping mt-1  me-1"></i>
                     Shopping Cart
                </a>
            </li>
            
            <?php
              //is connected
              if (isset($_SESSION["connected"]) && $_SESSION["connected"]){?>
                <li class="nav-item">
                  <a href="?order=account" >
                      <i class="fa-solid fa-user"></i>
                      <!-- connecté -->
                      My Account
                  </a>
                </li>
                <li>
                  <a href="?order=disconnect">
                    <i class="fa-solid fa-arrow-right-from-bracket mt-1  me-1"></i>
                      <!-- deconnecter -->
                      Disconnect
                  </a>
                </li>
                
                <?php
              }
              else{?>
                <!-- <a data-bs-toggle="modal" data-bs-target="#myModal" href=""> -->
                <li class="nav-item">
                  <a href="?order=login" >
                    <i class="fa-solid fa-user"></i>                    
                    <!-- pas co = -->
                    Login
                  </a>
                </li>
                
              <?php 
            }
            ?>
        </ul>
    </nav>
</div>


<!-- Modal -->

<!-- Button to Open the Modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Open modal
</button> -->

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="content-login modal-content col">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="POST" action="?order=login&check=0">
        <div class="modal-body">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="" placeholder="Enter email" required>

            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control <?=$usercheck==false ? "is-invalid" : "" ?>" id="exampleInputPassword1" name="password" placeholder="Password" required>

            <!-- try ajax???? -->

            <div  class="invalid-feedback">
               <p>Email address or password wrong.</p>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
        

    </div>
  </div>
</div>