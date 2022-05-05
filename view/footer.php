
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : footer de la page
-->


<footer>
    <div class="container mt-5">
        
        <div class="footer-container ">
            <div class="footer-section ">
                <h4>Sarah Souffleur</h4>
                <!-- Grid container -->
                <div>
                    <!-- Section: Social media -->
                    <section class="mb-2 container-flex row " >
                        <div class="container-flex container-centertextV col"><!-- ArtStation -->
                            <a class="btn btn-outline-light btn-floating m-2" href="https://www.artstation.com/souffleur_sarah" target="_blank" role="button">
                                <i class="fab fa-artstation"></i> 
                            </a>
                            <p>Artstation</p>
                        </div>
                        
                        <div  class="container-flex container-centertextV col"> <!-- Instagram -->
                            <a class="btn btn-outline-light btn-floating m-2" href="https://www.instagram.com/saltysailor14" target="_blank" role="button">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <p>Instagram</p>
                        </div>
                         
                        <div class="container-flex container-centertextV col"><!-- Linkedin -->
                            <a class="btn btn-outline-light btn-floating m-2" href="https://fr.linkedin.com/in/sarah-souffleur-5a6950207?trk=public_profile_browsemap" target="_blank" role="button">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <p>Linkedin</p>
                        </div>
                        
                        <div class="container-flex container-centertextV col"> <!-- E-Mail -->
                            <a class="btn btn-outline-light btn-floating m-2" href="mailto:addresse@email.com" target="_blank" role="button">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                            <p>E-mail</p>
                        </div>
                        

                    </section>
                    <!-- Section: Social media -->
                </div>
                <!-- Grid container -->

            </div>
            <div class="footer-section" style="display:block">
                
                <div class="text-center p-3" style="align-self: center;">
                    <p> All rights reserved </p>
                </div>
                
            </div>

        </div>
        
    </div>
    
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- collapse not working with these two... -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->



<!-- modal -->
<script>
// source : https://stackoverflow.com/a/71326915
const exampleModalEl = document.getElementById('exampleModal');

exampleModalEl.addEventListener('show.bs.modal', function(event) {
  document.getElementById('modalImage').src = event.relatedTarget.src;
});
</script>

<!-- show forms if radiobutton selected (fillAddress.php during order process) -->
<script type="text/javascript">
//source : https://khaalipaper.com/javascript/show-hide-divs-based-on-radio-button-selection-in-jquery.php#parentHorizontalTab1
    // example used : example 2  
  $(function() {
    $("input[name='useSavedAddress']").click(function() {
      if ($("#notUseSaved").is(":checked")) {
        $("#showForms").show();
      } else {
        $("#showForms").hide();
      }
    });
  });
</script>

<!-- password verification during account creation-->
<script>
    // confim password 
  var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
      $('input[type=radio][name=test]').click(function(){
          var related_class=$(this).val();
          $('.'+related_class).prop('disabled',false);
          
          $('input[type=radio][name=test]').not(':checked').each(function(){
              var other_class=$(this).val();
              $('.'+other_class).prop('disabled',true);
          });
      });
  });

</script>

<!-- password visibility -->
<script>
    // toggle password visibility
    // source : https://www.w3schools.com/howto/howto_js_toggle_password.asp

      function togglePassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  } 
</script>

</body>
</html>