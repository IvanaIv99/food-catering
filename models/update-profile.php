<?php
header("Content-type:application/json");
if( isset($_POST['poslato']) ){

    include "../config/connection.php";
    include '../models/functions.php';

    session_start();

    echo "USLO";

    $userID=$_SESSION['user']->userID;
    
    settype($userID,"integer");
    
        $fullname=$_POST["fullname"];
        $password=$_POST["password"];;
        $email=$_POST["email"];
        $address=$_POST["address"];
        $city=$_POST["city"];
        $country=$_POST["country"];
        $radio=$_POST["radio"];
        $photo=$_FILES["photo"];


        $regexFullname="/^([\w]{3,})+\s+([\w\s]{3,})+$/";
        $regexPassword="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
        $regexEmail="/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
        $regexAddress="/\w+(\s\w+){1,}/";

        $errors=[];

        validation($regexFullname,$fullname,"Fullname");
        validation($regexEmail,$email,"Email");
        validation($regexAddress,$address,"Address");


        if(!preg_match($regexPassword,$password)){
            $errors[]="Password is invalid!";
        }else{
            $password=MD5($password);
        }

        $tmpPath=$photo['tmp_name'];
        $namePhoto=time()."_".$photo['name'];
        $typePhoto=$photo['type'];

        $formats=['image/png','image/jpg','image/jpeg'];

        if(!in_array($typePhoto,$formats)){

            $errors[]="File format is not an image!";
            http_response_code(400);
            echo json_encode(['message'=>'File is not an image!']);

        }else{
          
            move_uploaded_file($tmpPath,"../public/images/user/$namePhoto");

            $imgSize=getimagesize("../public/images/user/$namePhoto");
            $width=$imgSize[0];
            $height=$imgSize[1];

            $newWidth=250;
            $newHeight=$height/($width/$newWidth);

            if( $typePhoto=='image/jpeg' || $typePhoto=='image/jpg' ){
                $uploaded=imagecreatefromjpeg("../public/images/user/$namePhoto");
                $thumb=imagecreatetruecolor($newWidth,$newHeight);
                imagecopyresampled($thumb,$uploaded,0,0,0,0,$newWidth,$newHeight,$width,$height);
                imagejpeg($thumb,"../public/images/user/smaller-images/smaller_".$namePhoto,100);
                
            }else{
                $uploaded=imagecreatefrompng("../public/images/user/$namePhoto");
                $thumb=imagecreatetruecolor($newWidth,$newHeight);
                imagecopyresampled($thumb,$uploaded,0,0,0,0,$newWidth,$newHeight,$width,$height);
                imagepng($thumb,"../public/images/user/smaller-images/smaller_".$namePhoto,100);
            }  

        }

        if(count($errors)){
            $code=422;
            echo json_encode($errors);

        }else{

            try{

                $query=$conn->prepare("UPDATE users SET fullname=? , password=? , email=? , gender=? , cityID =? ,countryID=? , address=? , img =?  
                WHERE userID=$userID ");
                $updated=$query->execute([$fullname,$password,$email,$radio,$city,$country,$address,$namePhoto]);

                echo json_encode([
                    "message"=>"You have successfully updated ur profile!"
                ]);

                http_response_code(204);

            }catch(PDOException $e){
               
                errors($e->getMessage());
                echo json_encode(['poruka'=> 'Database error: ' . $e->getMessage()]);
                http_response_code(500);

            }
            
            
        }
   

}

?>