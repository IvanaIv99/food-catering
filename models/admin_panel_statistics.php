<?php

require_once 'config/connection.php';

$totalorders=$conn->query('SELECT COUNT(orderID) as "total" FROM orders')->fetch();
$profit=$conn->query('SELECT SUM(total_price) as "profit" FROM order_details')->fetch();
$allusers=$conn->query('SELECT COUNT(userID) as "users" FROM users')->fetch();
$logged=$conn->query('SELECT COUNT(userID) as "logged" FROM users WHERE loggedIn=1 AND roleID=1')->fetch();




$sadrzaj=file("data/log.txt");


$brojRedova=count($sadrzaj);


$br_main=0;
$br_contact=0;
$br_ordermeal=0;
$br_myprofile=0;
$br_orders=0;
$br_messages=0;
$br_about=0;

$all_main=0; 
$all_contact=0;
$all_ordermeal=0;
$all_myprofile=0;
$all_orders=0;
$all_messages=0;
$all_about=0;

for($i=0;$i<$brojRedova;$i++){

  $jedanRed=explode("\t",$sadrzaj[$i]);
 
  $datumVreme=$jedanRed[1];

  if(strtotime($datumVreme)>strtotime("-1 day")){
    $url=$jedanRed[0];
 //   $url=explode("?",$url)[1];
    if (strpos($url, 'page=main_page')) {
      $br_main+=1;
    }
    if (strpos($url, 'page=about')) {
        $br_about+=1;
    }
    if (strpos($url, 'page=menu')) {
      $br_ordermeal+=1;
    }
    if (strpos($url, 'page=contact')) {
      $br_contact+=1;
    }
    if (strpos($url, 'page=user&section=myprofile')) {
      $br_myprofile+=1;
    }
    if (strpos($url, 'page=user&section=messagesUser')) {
      $br_messages+=1;
    }
    if (strpos($url, 'page=user&section=orders')) {
      $br_orders+=1;
    }

  }

  
  $url=$jedanRed[0];
  if(strpos($url,'index.php')){

    if (strpos($url, 'page=main_page')) {
      $all_main+=1;
      
    }
    if (strpos($url, 'page=menu')) {
      $all_ordermeal+=1;
    }
    if (strpos($url, 'page=contact')) {
      $all_contact+=1;
    }
    if (strpos($url, 'page=user&section=myprofile')) {
      $all_myprofile+=1;
    }
    if (strpos($url, 'page=user&section=messagesUser')) {
      $all_messages+=1;
    }
    if (strpos($url, 'page=user&section=orders')) {
      $all_orders+=1;
      
    }
    if (strpos($url, 'page=about')) {
        $all_about+=1;
        
      }
    
  }
  
}

$suma=$all_about+$all_contact + $all_main + $all_messages + $all_myprofile + $all_ordermeal + $all_orders+ $all_orders;



$percentMainPage=round(($all_main/$suma)*100);
$percentOrderMeal=round(($all_ordermeal/$suma)*100);
$percentContact=round(($all_contact/$suma)*100);
$percentMyprofile=round(($all_myprofile/$suma)*100);
$percentMessages=round(($all_messages/$suma)*100);
$percentOrders=round(($all_orders/$suma)*100);
$percentAbout=round(($all_about/$suma)*100);




?>