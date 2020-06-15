<div class="breadcam_area breadcam_bg_1 zigzag_bg_2">
            <div class="breadcam_inner">
                <div class="breadcam_text">
                    <!-- <h3>About Us</h3> -->
                    <?php
                  
                    if(isset($_GET['page'])){
                        switch($_GET['page'])
                        {
                          case 'about':
                            echo "<h3>About Us</h3>";
                            break;
                          case 'service':
                            echo "<h3>Services</h3>";
                            break;
                          case 'gallery':
                            echo "<h3>Gallery</h3>";
                            break;
                          case 'menu':
                            echo "<h3>Menu</h3>";
                            break;
                          case 'contact':
                            echo "<h3>Contact Us</h3>";
                            break;
                          case 'author':
                            echo "<h3>Author</h3>";
                            break;
                          case 'login_register':
                            echo "<h3>Log in / Register</h3>";
                            echo "<p>Don't have an account?</p>";
                            echo "<a href='' id='registerLink' style='color:white'>REGISTER</a>";
                            break;
                          
                        }
                      }else {
                            include "views/pages/main_page.php";
                        }
                    
                    //echo "<p>inappropriate behavior is often laughed off as “boys will be boys,” women <br> face higher conduct standards especially in the workplace. That’s why it’s <br> crucial that, as women.</p>";
                    if(isset($_GET['section'])){
                      switch($_GET['section'])
                      {
                        case 'myprofile':
                          echo "<h3>My profile</h3>";
                          break;
                        case 'editprofile':
                          echo "<h3>Edit profile</h3>";
                          break;
                        case 'orders':
                          echo "<h3>Orders</h3>";
                          break;
                        case 'statistics':
                          echo "<h3>Statistics</h3>";
                          break;
                        case 'messages':
                          echo "<h3>Messages</h3>";
                          break;
                        case 'editmealplan':
                          echo "<h3>Edit mealplan</h3>";
                          break;
                        case 'adminprofile':
                          echo "<h3>Admin profile</h3>";
                        break;
                        case 'message_reply':
                          echo "<h3>Messages</h3>";
                          break;
                        case 'messagesUser':
                          echo "<h3>Messages</h3>";
                          break;
                        
                      }
                    }

                    ?>
      
                   
                </div>
            </div>
    </div>
               