<div class="container">

<!-- 
show image
upload new image (ratio for the preview)
change name
change description

 -->
 <h3>Edit Project Information</h3>
 <div class="row">
    <div class="col">
        <div class="container">
            <label for="Change project cover">Change project cover</label>

                <div class="row">
                <img src="resources/img/<?=$projectInfo[0]['catImage']?>" alt="">
                    <div class="col imgUp">
                        
                        <div class="imagePreview ratio ratio-16x9" style="background-size: contain; background-color:black;background-position: center; "></div>
                        <input type="file" name="image" class="form-control uploadFile img " value="Upload Photo" required>
                    </div>
                </div>
            </div>

    </div>
    <!-- image preview 
    source : https://codepen.io/MR_RooT/pen/RwPErrB -->     
    <div class="col-sm-7"> 
        <div>
            <label for="Project Name">Project Name</label>
            <input type="text" class="form-control" id="projectName" value="<?=$projectInfo[0]['catName']?>">
        </div>

        <div>
            <label for="Description">Description</label> <br>
            <textarea name="description" id="description" rows="8" style="width: 100%;"><?=$projectInfo[0]['catDescription']?></textarea>
        </div>
        
        <!-- remplir value -->
    </div>
 </div>
</div>

