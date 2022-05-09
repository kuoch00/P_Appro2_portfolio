<div class="container">
<form action="?admin=addItem" method="post" enctype="multipart/form-data" >
    <div class="row mt-3">
        <h3>Add new article</h3>
        <div class="col">
            <div class="">
                <!-- image preview 
                source : https://codepen.io/MR_RooT/pen/RwPErrB -->
                
                <div class="container">
                    <div class="row">
                        <div class="col imgUp">
                            <div class="imagePreview ratio ratio-1x1"></div>
                            <!-- <label class=""> -->
                                <input type="file" name="image" class="form-control uploadFile img " value="Upload Photo" required>
                            <!-- </label> -->
                            <!-- <input class="form-control" type="file" id="formFile"> -->
                        </div><!-- col --> 
                    </div><!-- row -->
                </div><!-- row -->  
            </div> 
        </div>    
        <div class="col-sm-7">
            <div class="row">
                <div class="col-lg-2">
                    <label for="itemName" class="form-label">Name</label>
                </div>
                <div class="col-lg">
                    <input type="text" name="name" class="form-control" required>
                </div>    
            </div>

            <div class="row mt-3">
                <div class="col-lg-2">
                    <label for="itemName" class="form-label">Description</label>
                </div>
                <div class="col-lg">
                    <textarea class="form-control" name="description" id="" required></textarea>
                    
                </div>    
            </div>
            
            <div class="row mt-3">
                <div class="col-lg-2">
                    <label for="itemName" class="form-label">Price</label>
                </div>
                <div class=" col-lg-5">
                    <div class="input-group"> 
                        <input type="number" name="price" class="form-control" aria-label="price" aria-describedby="basic-addon1" required>
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                </div>    
            </div>

            <div class="row mt-3">
                <div class="col-lg-2">
                    <label for="itemName" class="form-label">Stock</label> 
                </div>
                <div class="col-lg-5">
                    <input type="number" name="stock" class="form-control" required>
                </div>    
            </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="?admin=home" type="button" class="btn btn-secondary col-md-2"> Cancel </a>
        <input class="btn btn-primary col-md-2" type="submit" value="Add article">
    </div>

</form>
</div>