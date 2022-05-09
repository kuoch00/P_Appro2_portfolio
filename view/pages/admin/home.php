<!-- 
edit homepage
edit gallery
    show list projects
        edit project info
        edit project gallery
edit shop
    show array all articles
        add article
        edit article
        delete article
 -->
<div class="container mt-3">
<h3>Admin</h3>
<div class="accordion" id="">
    <div class="accordion-item bg-transparent">
        <h2 class="accordion-header mt-0" id="headingOne">
            <button class="accordion-button collapsed bg-color" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Edit homepage (not working with current config)
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                change pic <br>
                change description <br> 
            </div>
        </div>
    </div>
    <div class="accordion-item bg-transparent">
        <h2 class="accordion-header  mt-0" id="headingTwo">
            <button class="accordion-button collapsed bg-color" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Edit gallery
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <a class="btn btn-primary" href="?admin=works&option=add" role="button">Add new work</a>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Description</th> 
                            <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($listProjects as $project){?>
                                <tr>
                                <th scope="row"><?=$project['catName']?></th>
                                <td><?=$project['catImage']?></td>
                                <td><?=$project['catDescription']?></td>
                                <td>
                                    <a href="?admin=works&option=editProject"> 
                                        <i class="fa-solid fa-pen fa-lg "></i>
                                    </a>
                                    <a href="?admin=works&option=deleteProject" class="ms-2">
                                        <i class="fa-solid fa-trash fa-lg "></i> 
                                    </a>
                                    <!-- action dangereuse donc mettre un avertissement!! ou faire un hidden ? -->
                                
                                </td>
                                </tr>
                                <?php
                            }
                            
                        ?>
                    
                        </tbody>
                    </table>
                    
                </div>
                    project 1
                        array all gallery
                    project 2
                        array all gallery
                    project 3
                        array all gallery
            </div>
        </div>
    </div>
    <div class="accordion-item bg-transparent">
        <h2 class="accordion-header  mt-0" id="headingThree">
            <button class="accordion-button collapsed bg-color" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Edit shop
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <a class="btn btn-primary" href="?admin=addItem" role="button">Add new article</a>

                show array of all items
                button add new item 
                button edit item  
                    name, stock, description, image 
                button delete item 
            </div>
        </div>
    </div>
</div>
</div>