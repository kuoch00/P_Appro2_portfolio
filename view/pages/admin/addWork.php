<div class="container mt-3">
    <form action="?admin=works&option=add" method="post" enctype="multipart/form-data" >
        <div class="row">
            <h3>add work</h3>
            <div class="col">
                <div class="">
                    <!-- image preview 
                    source : https://codepen.io/MR_RooT/pen/RwPErrB --> 
                    <div class="container">
                        <div class="row">
                            <div class="col imgUp">
                                <div class="imagePreview ratio ratio-1x1" style="background-size: contain; background-color:black;background-position: center; "></div>
                                <input type="file" name="image" class="form-control uploadFile img " value="Upload Photo" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-sm-7">
                <div class="row mt-1">
                    <div class="col-lg-2">
                        <label for="itemName" class="form-label">Category</label>
                    </div>
                    <div> 
                        <input class="form-control" name="category" list="listCategories" id="exampleDataList" placeholder="Ex: School Work, Son of Wrath, ..." required>
                        <datalist id="listCategories">
                            <?php
                            foreach($listCategories as $category){
                                ?>
                                <option value="<?=$category['catName']?>"> 
                                <?php
                            }
                            ?> 
                        </datalist> 
                    </div> 
                </div>    
                <div class="row mt-1">
                    <div class="col-lg-2">
                        <label for="itemName" class="form-label">Subcategory</label>
                    </div>
                    <div> 
                        <input class="form-control" name="subcategory" list="listSubcategories" id="exampleDataList2" placeholder="Ex : Character Design, Storyboard, ..." required>
                        <datalist id="listSubcategories">
                            <?php
                            foreach($listSubcat as $subcat){
                                ?>
                                <option value="<?=$subcat['subName']?>"> 
                                <?php
                            }
                            ?> 
                        </datalist> 
                    </div>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="?admin=home" type="button" class="btn btn-secondary col-md-2"> Cancel </a>
            <input class="btn btn-primary col-md-2" type="submit" value="Add work">
        </div>
    </form>
</div>