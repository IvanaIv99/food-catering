<?php
session_start();
if(isset($_POST['btnLogout'])){
    require_once '../config/connection.php';

    $userID=$_SESSION['user']->userID;

    unset($_SESSION['user']);
    
    $query=$conn->query("UPDATE users SET loggedIn=0 WHERE userID=$userID");
    header("Location:../index.php");
}