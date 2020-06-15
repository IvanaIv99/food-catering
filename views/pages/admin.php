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
                                   
                                    case 'statistics':
                                        include "views/statistics.php";
                                    break;
                                    case 'messages':
                                        include "views/messages.php";
                                    break;
                                    case 'editmealplan':
                                        include "views/editmealplan.php";
                                    break;
                                    case 'adminprofile':
                                        include "views/my_profile.php";
                                    break;
                                    case 'addnewmeal':
                                        include "views/add_new_meal.php";
                                    break;
                                    case 'editmeal':
                                        include "views/edit_meal_form.php";
                                    break;
                                    case 'message_reply':
                                        include "views/reply_messages_form.php";
                                    break;
                                    
                                }
                            }
                        ?>
                
                    
                </div>
            </div>
        </div>
        

    

</body>
</html>