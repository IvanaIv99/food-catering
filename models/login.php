<?php

    session_start();

    if(isset($_POST["login-btn"])){

        
        $email=$_POST["EMAIL"];
        $password=$_POST["password"];

        $errors=[];

        $regexPassword="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
        $regexEmail="/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";

        if(!preg_match($regexPassword,$password)){
            $errors[]="Invalid password";
        }

        if(!preg_match($regexEmail,$email)){
            $errors[]="Invalid email";
        }

        if(count($errors)>0){
            $_SESSION['errors']=$errors;
            header("Location:../index.php?page=login_register");
            
        }else{
            require_once("../config/connection.php");
            
            $email=$_POST['EMAIL'];
            $password=MD5($_POST['password']);

            $query=$conn->prepare("SELECT u.userID,u.fullname,u.email,u.password,u.cityID,u.countryID,u.address,u.gender,u.img as img ,r.roleID,r.name,c.name as country,city.name as city FROM users u INNER JOIN roles r ON r.roleID=u.roleID INNER JOIN countries c ON u.countryID=c.countryID INNER JOIN cities city ON u.cityID=city.cityID WHERE u.email=:email AND u.password=:passwordU");


            $query->bindParam(":email",$email);
            $query->bindParam(":passwordU",$password);

            $query->execute();
            $user=$query->fetch();


            if($user){
                $query=$conn->query("UPDATE users SET loggedIn=1 WHERE userID=$user->userID");
                $_SESSION['user']=$user;
                header("Location:../index.php?page=user&section=myprofile");
 
                if($user->roleID==2){
                header("Location:../index.php?page=admin&section=statistics");
                }else{
                    header("Location:../index.php?page=user&section=myprofile");
                }
              }else{
                 $_SESSION['errors']="Wrong email or password!";
                 header("Location:../index.php?page=login_register");
                
 
              }
        }

    }


?>