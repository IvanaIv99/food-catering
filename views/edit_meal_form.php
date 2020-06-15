<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
        <form action="" method="post">

            <?php
                
                    $menuID=$_GET['id'];
                    
                    
                        $upit=$conn->query("SELECT * from menu_ingredients as im INNER JOIN ingredients as i ON im.ingredientsID=i.ingredientsID where im.menuID=$menuID");
                        $ingr=$upit->fetchAll();
                    


                     $query=$conn->query("SELECT * FROM `menu` where menuID=$menuID");
                     $menu=$query->fetch();
                     
            ?>

            <div class="mt-10">
                <input type="hidden"  id="meal-id" name="meal-id"                
                class="single-input bg-light" value="<?=$menu->menuID?>"> 
            </div>
            <div class="mt-10">
                <input type="text"  id="meal-name" name="meal-name" placeholder="Meal Name"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Meal Name'" required
                class="single-input bg-light" value="<?=$menu->name?>"> 
                <p class="validation">Invalid meal name.</p>     
            </div>
            <div class="mt-10">
                <input type="text"  id="meal-price" name="meal-price" placeholder="Meal Price $"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Meal Price $'" required
                class="single-input bg-light" value="<?=$menu->price?>">  
                <p class="validation">Price must be a digit.</p>    
            </div>
            <div class="mt-10">
                <select class="custom-select mt-2 border-0 categoriesList">
                    <option value="0" selected>Choose category</option>
                    <?php
                        $query=$conn->query("SELECT * FROM `categories`");
                        $podaci=$query->fetchAll();
                        foreach($podaci as $p):?>
                        <option value="<?=$p->categoryID?>" <?=  is_checked($menu->categoryID,$p->categoryID ); ?>><?=$p->name?></option>
                    <?php endforeach;
                       function is_checked($menuCatId,$catId){
                            return $menuCatId===$catId ?  'selected' : "";
                         }
                    ?>
                </select>
            </div>
            <div id="divIng">
            <?php
            for($i=0;$i<count($ingr);$i++):?>
                <div class="mt-10 ingredients-div">
                    <div class="d-flex flex-row " >
                        <input type="text" id="meal-ingredient" placeholder="Ingredient"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingredient'" required
                        class="single-input bg-light meal-ingredient" value="<?=$ingr[$i]->name?>">
                        <!-- <a href="" class="boxed_btn btn-correction" data-id="">+</a>  -->
                        <button class="add-new-ingredient buttonAdd">+</button>
                        
                    </div>
                </div>
           
            
            <?php endfor;?>
            <input type="hidden"  id="ing-num" name="ing-num"                
                class="single-input bg-light" value="<?=count($ingr)?>"> 
            </div>
            <p class="validation">Invalid ingredient names</p>
            <div class="input-group mt-10">
                <div class="input-group">
                    <div class="custom-file bg-light">
                        <input type="file" class="custom-file-input border-0" id="meal-img" value="<?=$menu->img?>">
                        <label class="custom-file-label border-0 bg-light text-secondary" for="profile_photo"><?=$menu->img?></label>
                    </div>
                </div>
           </div>
           <p class="validation">Photo must be .jpeg, .jpg or .png</p>
           <input type="button" id="editBtn" class="genric-btn primary align-self-center mt-10" value="EDIT"/>

           
        
        </form>

        

        <div id="addMealMessage"></div>
        </div>
    </div>
    

</div>