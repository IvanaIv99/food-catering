<!doctype html>
<html class="no-js" lang="zxx">

<?php
    include "views/fixed/head.php";
?>
<body>
    
    <?php
 
        include "views/fixed/header.php";

        include "views/breadcam_area.php";

        // include "views/user_admin_area.php";
        

    ?>

<div class="whole-wrap">
            <div class="container box_1170">
                <div class="section-top-border">
                        <?php
                            if(isset($_GET['section'])){
                                switch($_GET['section']){
                                    case 'myprofile':
                                        include "views/my_profile.php";
                                    break;
                                    case 'editprofile':
                                        include "views/update_profile_form.php";
                                    break;
                                    case 'orders':
                                        include "views/user_orders.php";
                                    break;
                                    
                                    case 'messages':
                                        include "views/messages.php";
                                    break;
                                   
                                    case 'messagesUser':
                                        include "views/messages.php";
                                    break;
                                }
                            }
                        ?>
                
                    
                </div>
            </div>
        </div>
    
        

    

</body>
</html>