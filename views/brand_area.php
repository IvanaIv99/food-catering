<div class="brand_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-70">
                        <h3>Brands love to take Our Services</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                include "models/get_brands.php";
                foreach($brands as $b):?>
                    <div class="col-xl-2 col-md-6 col-lg-3">
                        <div class="single_brand">
                            <img src="assets/img/brand/<?=$b->img?>" alt="<?=$b->name?>">
                        </div>
                    </div>
                <?php endforeach;?>
                </div>
        </div>
    </div>