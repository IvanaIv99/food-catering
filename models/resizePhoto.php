<?php
    session_start();
    include_once("../config/connection.php");

    $result=$conn->query("SELECT img FROM users WHERE $");
    $images=$result->fetchAll();
    $userID=$_SESSION['user']->userID;
    
    

?>