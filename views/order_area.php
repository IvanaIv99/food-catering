<div class="order_area">
        <div class="container">
            <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title mb-3">
                            <h3>Order your food now</h3>
                            <p>Always choose what you love.</p>
                        </div>
                        <div class="col-lg-12 mb-3 filter-sort-bar d-flex flex-row  justify-content-center">
                            <div class="col-lg-3">
                                <select class="custom-select mt-2 border-0 categoriesList">
                                    <option value="0" selected>All</option>
                                    <?php
                                       include "models/get_categories.php";
                                        foreach($categories as $p):?>
                                        <option value="<?=$p->categoryID?>"><?=$p->name?></option>
                                    <?php endforeach;?>

                                </select>
                            </div>
                            <div class="col-lg-1 margin5">
                                <a href="" id="sortPriceDesc">
                                    <i class="fas fa-dollar-sign fa-l "></i>
                                    <i class="fas fa-sort-numeric-up-alt fa-l"></i>
                                </a>
                            </div>
                            <div class="col-lg-1 margin5">
                                <a href="" id="sortPriceAsc">
                                    <i class="fas fa-dollar-sign fa-l "></i>
                                    <i class="fas fa-sort-numeric-up fa-l"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row mt-1 menuProducts">

            <?php
                function sastojci($id){
                    global $conn;
                    $upit=$conn->query("SELECT * from menu_ingredients as im INNER JOIN ingredients as i ON im.ingredientsID=i.ingredientsID where im.menuID=$id");
                    $podaci=$upit->fetchAll();
                    $string="";
                    $i=0;
                    foreach($podaci as $p){
                        $i=$i+1;
                        $string.=$p->name." | ";
                        
                    }
                    return $string;
                }
                 $query=$conn->query("SELECT * FROM `menu`");
                 $podaci=$query->fetchAll();
                 
                 foreach($podaci as $p):?>
                    <div class="col-xl-4 col-md-6">
                        <div class="single_order">
                            <div class="order_thumb">
                                <img src="public/images/meals/<?=$p->img?>" alt="">
                                <div class="order_prise">
                                    <span><?=$p->price?></span>
                                </div>
                            </div>
                            <div class="order_info">
                                <h3><a href="#"><?=$p->name?></a></h3>
                                <p class="ingredientsList"><?= sastojci($p->menuID); ?>
                                </p>
                                <div class="col-xl-12 col-lg-12 mb-3">
                                    <input type="number" value="1" min="1" max="10" class="quantityInMenu"/>
                                </div>
                                <a href="" class="boxed_btn add-to-cart" data-id="<?=$p->menuID?>" data-userid="<?=$p->$_SESSION['user']->userID?>" >ADD TO CART</a>
                                <span class="addedToCartMessage"></span>
                            </div>
                        </div>
                    </div>
            <?php endforeach;?>   
            </div>
            <div class="col-12 text-center">
                <a href="models/excel.php" class="text-center m-auto text-primary">EXPORT EXCEL</a>
            </div>
        </div>
    </div>