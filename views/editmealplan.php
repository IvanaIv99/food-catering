<div class="order_area">
    <div class="container"> 
    <a href="index.php?page=admin&section=addnewmeal" class="boxed_btn mb-3">ADD NEW MEAL</a>
        <div class="row">
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
                                <p><?= sastojci($p->menuID); ?></p>
                             <a href="index.php?page=admin&section=editmeal&id=<?=$p->menuID?>" class="boxed_btn edit_meal" >EDIT</a>
                            </div>
                        </div>
                    </div>
            <?php endforeach;?>   

            </div>
   </div>
</div>
