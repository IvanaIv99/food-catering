<div class="gallery_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-70">
                        <h3>Gallery Images</h3>
                    </div>
                </div>
            </div>
            <div class="row  grid">
                <?php
                    include "models/get_gallery.php";
                    foreach($gallery as $g):?>
                        <div class="col-xl-5 col-lg-5 col-md-6 grid-item">
                        <div class="single_gallery long_height gallery_bg_1">
                            <a href="public/images/gallery/<?=$g->img?>" class="popup-image"></a>
                        </div>
                </div>
                <?php endforeach;?>
                <!-- <div class="col-xl-5 col-lg-5 col-md-6 grid-item">
                    <div class="single_gallery long_height gallery_bg_1">
                        <a href="img/gallery/01.png" class="popup-image"></a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 grid-item">
                    <div class="single_gallery mini_height  gallery_bg_6">
                        <a href="img/gallery/6.png" class="popup-image"></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 grid-item">
                    <div class="single_gallery mini_height gallery_bg_7">
                        <a href="img/gallery/7.png" class="popup-image"></a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6 grid-item">
                    <div class="single_gallery mid_height gallery_bg_5">
                        <a href="img/gallery/5.png" class="popup-image"></a>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-6 grid-item">
                    <div class="single_gallery mini_height gallery_bg_2">
                        <a href="img/gallery/2.png" class="popup-image"></a>
                    </div>
                </div> -->
                
                
                
                    </div>  
            </div>
            
        </div>
    </div>