<!doctype html>
<html class="no-js" lang="zxx">

<?php

    session_start();

    include "config/connection.php";
    
    include "views/fixed/head.php";
?>

<body>
   
        

<?php

  include "views/fixed/header.php";

    if(isset($_GET['page'])){
      
      
        switch($_GET['page'])
        {
          case 'main_page':
            include "views/pages/main_page.php";
            break;
          case 'about':
            if(isset($_SESSION['user'])){
              
              include "views/pages/about.php";
              
            }else{
              include "views/404.php";
            }
            
            break;
          
          case 'menu':
            if(isset($_SESSION['user'])){
               if($_SESSION['user']->roleID==1){
                  include "views/pages/menu.php";
               }else include "views/not-allowed.php";
            }else{
              include "views/404.php";
            }
            
            break;
          case 'contact':

            if(isset($_SESSION['user'])){
              if($_SESSION['user']->roleID==1){
                 include "views/pages/contact.php";
              }else include "views/not-allowed.php";
           }else{
             include "views/404.php";
           }
          break;

          case 'login_register':
            
            include "views/pages/login_register.php";
            break;
          case 'author':
            
            include "views/pages/author.php";
            break;
          case 'user':
            
            // include "views/pages/user.php";

            if(isset($_SESSION['user'])){
              if($_SESSION['user']->roleID==1){
                 include "views/pages/user.php";
              }else include "views/not-allowed.php";
           }else{
             include "views/404.php";
           }


            break;
          case 'admin':
            // include "views/pages/admin.php";
            if(isset($_SESSION['user'])){
              if($_SESSION['user']->roleID==2){
                 include "views/pages/admin.php";
              }else include "views/not-allowed.php";
           }else{
             include "views/404.php";
           }

            break;
         
        }
      }else {
            include "views/pages/main_page.php";
        }


    include "views/fixed/footer.php";
?>  



</body>

</html>