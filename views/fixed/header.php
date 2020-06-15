<header>
    <div class="header-area">
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="main-menu d-none d-lg-block">

            <nav>
            

                <ul class="mein_menu_list" id="navigation">
                <div class="logo-img d-none d-lg-block">
                            <a href="index.php?page=main_page">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                </div>
                <?php
                
                if(!isset($_SESSION['user'])){ ?>
                    <div class="d-flex justify-content-end">
                        <li><a href="index.php?page=author">Author</a></li>
                        <li><a href="">Documentation</a></li>
                    </div>
                        
                <?php } ?>

                    <?php
                    if(isset($_SESSION['user']))
                        if($_SESSION['user']->roleID=="1"){ ?>
                                <?php
                    
                                    $result=$conn->query("SELECT * FROM `navigation` WHERE roleID IS NULL");
                                    $nav=$result->fetchAll();
                                        
                                    foreach($nav as $n):?>
                                    <li><a href="index.php?page=<?=$n->href?>"><?=$n->name?></a></li>
                                <?php endforeach;?>

                                <li><a href="#">Profile <i class="ti-angle-down"></i></a>
                                    <ul class="submenu">
                                        <?php 
                                        $result=$conn->query("SELECT * FROM `navigation` WHERE roleID=1");
                                        $nav=$result->fetchAll();
                                            
                                        foreach($nav as $n):?>
                                        <li><a class="menuLinks" data-val="<?=$n->name?>" href="index.php?page=user&section=<?=$n->href?>"><?=$n->name?></a></li>
                                        <?php endforeach;?>
                                    </ul>
                                </li>
                                <li><div class="content">
                        <div class="button">
                            <h1>
                            <div class="icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
                            </h1> 
                        <div class="cart-summary">
                        <div class="cartMessage"> </div>
                        <?php
                            if(isset($_SESSION['user'])):?>
                            
                            <div class="itemsInCart">

                            </div>

                            <div class="cart-summary-item cart-summary-total">
                                <h4 class="text-center">Total: <span class="totalInCart">$ 11.95</span></h4>
                            </div>
                            <a class="checkoutBtn text-center" href="index.php?page=user&section=orders">Checkout</a>

                        <?php endif;?>
                        <?php
                            if(!isset($_SESSION['user'])):?>
                                <span class="cartMessage">Register first!</span>
                        <?php endif;?>
                            
                        </div>
                            
                        </div>
                        
                    </div>
                    </li>
                        
                    <?php }else if($_SESSION['user']->roleID=="2"){  ?>
                        <?php
                            $result=$conn->query("SELECT * FROM `navigation` WHERE roleID=2");
                            $nav=$result->fetchAll();
                                
                            foreach($nav as $n):?>
                            <li><a href="index.php?page=admin&section=<?=$n->href?>"><?=$n->name?></a></li>
                        <?php endforeach;?>
                    <?php }?>
                </ul>
            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                        <div class="custom_order">
                            <?php
                                if(isset($_SESSION['user'])):?>
                                    <form action="models/logout.php" method="POST">
                                    <input type="submit" class='boxed_btn_white text-dark' name="btnLogout" value="LOGOUT"/>
                                    </form>
                            <?php endif;?>
                            <?php
                                if(!isset($_SESSION['user'])):?>
                                    <a class="boxed_btn_white" href="index.php?page=login_register">LOG IN</a>
                            <?php endif;?>
                        
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                    <div class="logo-img-small d-sm-block d-md-block d-lg-none">
                            <a href="index.php?page=main_page">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</header>