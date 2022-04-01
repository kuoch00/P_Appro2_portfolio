
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page de contact
-->

<form class="container"> 
    <h2>Contact </h2>
    <div style="width: 1000px;">
        <div class="row">
            <div class="form-group col">
                <label for="exampleFormControlInput1">First Name</label>
                <input type="firstname" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
            </div>
            <div class="form-group col">
                <label for="exampleFormControlInput1">Last Name</label>
                <input type="lastname" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="exampleFormControlInput1">E-mail address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group row">
            <label for="exampleFormControlInput1">Subject</label>
            <input type="subject" class="form-control" id="exampleFormControlInput1" placeholder="Question, bug, etc...">
        </div>

        <div class="form-group row">
            <label for="exampleFormControlTextarea1">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="formButtonBox ">
            <input class="btn btn-primary formButtonSubmit" type="submit" value="Submit">
        </div>
    </div>
    
</form>