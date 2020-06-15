<div class="col-9 d-flex flex-row justify-content-center" id="my_profile">
            
                
                <div class="col-4">
                    <?php
                        $img=$_SESSION['user']->img;
                        echo "<img src='public/images/user/$img' alt='profilephoto' class='img-thumbnail user-profilepicture'/>"
                    ?>
                </div>

               

                <div class="col-6 user-info">
                    <?php
                        
                        include_once("config/connection.php");
                        $userID=$_SESSION['user']->userID;

                        $query=$conn->query("SELECT u.userID,u.fullname,u.email,u.address,u.img as img ,city.name AS city ,country.name AS country
                        FROM `users` AS u INNER JOIN `cities` AS city ON u.cityID=city.cityID INNER JOIN `countries` AS country ON country.countryID=city.countryID where u.userID=$userID");

                        $podaci = $query->fetchAll();
                        foreach($podaci as $u):?>

                        <ul>
                            <li><p class="p-userinfo">Fullname:</p><?=$u->fullname?></li>
                            <li><p class="p-userinfo">Email:</p><?=$u->email?></li>
                            <li><p class="p-userinfo">Address:</p><?=$u->address?></li>
                            <li><p class="p-userinfo">Location:</p><?=$u->city?>,<?=$u->country?></li>
                        </ul>

                    <?php endforeach;?>
                    
                    <?php
                        if(isset($_SESSION['user']))
                        if($_SESSION['user']->roleID=="1"){ ?>

                        <a href="index.php?page=user&section=editprofile" class="boxed_btn btn-edit">EDIT PROFILE</a>

                        <?php } else if($_SESSION['user']->roleID=="2") { ?>
                        <a href="index.php?page=admin&section=editprofile" class="boxed_btn btn-edit">EDIT PROFILE</a>

                    <?php }?>
                    
                    
                    
                </div>
                
                 
                


    </div>

</div>

