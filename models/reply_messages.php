
<?php
    header("Content-Type: application/json");
    if(isset($_POST['send'])){
        

        $userID=$_POST['userID'];
        $messageID=$_POST['messageID'];
        $messageReply=$_POST['messageReply'];
        $sentTime=time();

        echo $messageReply;

        $regex="/((?!=|\,|\.).)+(.)$/";
        $errors=[];


        if(!preg_match($regex,$messageReply)){
            $errors[]="Message too short or empty!";
        }

        if(count($errors)){
            http_response_code(422);
            echo json_encode($errors);
        }else{

            try{

                require_once("../config/connection.php");
    
                $query=$conn->prepare("UPDATE messages SET reply=? WHERE messageID=$messageID");
                $query->execute([$messageReply]);
                
                http_response_code(204);
                echo json_encode(['message'=> 'Message sent!']);
    
            }catch(PDOException $ex){
    
                echo json_encode(['message'=> 'Error with database: ' . $ex->getMessage()]);
                
            }
    }

}
?>
