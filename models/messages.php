<?php
header("Content-Type: application/json");

if(isset($_POST['send'])){

    $userID=$_POST['userID'];
    $message=$_POST['message'];
    // $subject=$_POST['subject'];
    $sentTime=time();

    $regex="/^([\w\s]{4,}[\!\.\,\?]?)+$/";

    $ok=[];
    $errors=[];

    if(!preg_match($regex,$message)){
        $errors[]="Message not in format!";
    }
    // if(!preg_match($regex,$subject)){
    //     $errors[]="Subject not in format!";
    // }

    if(count($errors)){
        http_response_code(422);
        echo json_encode($errors);

    }else{
        
        try{

            require_once("../config/connection.php");

            $query=$conn->prepare("INSERT INTO messages VALUES (NULL,?,?,?,NULL)");
            $query->execute([$message,$userID,$sentTime]);
            
            http_response_code(201);
            echo json_encode(['message'=> 'Message sent!']);

        }catch(PDOException $ex){

            echo json_encode(['poruka'=> 'Error with database: ' . $ex->getMessage()]);
            http_response_code(500);
        }

    }  

    
}


?>