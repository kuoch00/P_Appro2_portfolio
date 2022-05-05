<div class="container">
<form action="?admin=addItem" method="post">
    <div class="row mt-3">
        <div class="col">
            coucou
        </div>    
        <div class="col-sm-7">
            <div class="row">
                <div class="col-lg-2">
                    <label for="itemName" class="form-label">Name</label>
                </div>
                <div class="col-lg">
                    <input type="text" class="form-control">
                </div>    
            </div>

            <div class="row mt-3">
                <div class="col-lg-2">
                    <label for="itemName" class="form-label">Description</label>
                </div>
                <div class="col-lg">
                    <textarea class="form-control" name="" id="" ></textarea>
                    
                </div>    
            </div>
            
            <div class="row mt-3">
                <div class="col-lg-2">
                    <label for="itemName" class="form-label">Price</label>
                </div>
                <div class=" col-lg-5">
                    <div class="input-group">
                        
                        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                </div>    
            </div>

            <div class="row mt-3">
                <div class="col-lg-2">
                    <label for="itemName" class="form-label">Stock</label> 
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control">
                </div>    
            </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <input class="btn btn-primary col-md-2" type="submit" value="Add article">
    </div>

</form>
</div>