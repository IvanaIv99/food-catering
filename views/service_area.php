<div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-60">
                        <h3>Our Services</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                    <?php
                        include "models/get_services.php";
                        foreach($services as $s):?>
                            <div class="col-xl-4 col-md-6">
                                <div class="single_service">
                                    <div class="service_icon">
                                        <i class="<?=$s->icon?>"></i>
                                    </div>
                                <h4><?=$s->service?></h4>
                                <p><?=$s->description?></p>
                            </div>
                        </div>
                    <?php endforeach;?>

            </div>
        </div>
    </div>