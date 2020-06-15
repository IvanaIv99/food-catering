<?php
header("Content-Type: application/json");
if(isset($_POST['poslato'])){
    require_once '../config/connection.php';

   
    
    $mealName=$_POST['MealName'];
    $mealPrice=$_POST['MealPrice'];
    $mealImg=$_FILES['MealPhoto'];
    $ingredients[]=$_POST['ingredients'];
    $categoryID=$_POST['categoryID'];
    $ing=explode(",",$ingredients[0]);
    // $regexNameIngr="/^[A-z]+$/";
    $regexPrice="/^\d+(,\d{1,2})?$/";

    $errors=[];

    function validation($regex,$data,$string){
        if(!preg_match($regex,$data)){
            $errors[]="$string is invalid!";
        }
    } 

    // validation($regexNameIngr,$mealName,"Meal name");
    validation($regexPrice,$mealPrice,"Meal price");

    // foreach($ing as $i){
    //     if(!preg_match($regexNameIngr,$i)){
    //         $errors[]="Ingredient name is invalid!";
    //     }
    // }

    $tmpPath=$mealImg['tmp_name'];
    $nameImg=time()."_".$mealImg['name'];
    $typeImg=$mealImg['type'];

    $formats=['image/png','image/jpg','image/jpeg'];

    if(!in_array($typeImg,$formats)){

        $errors[]="File format is not an image!";
        http_response_code(400);
        echo json_encode(['message'=>'File is not an image!']);

    }else{
      
        move_uploaded_file($tmpPath,"../public/images/meals/$nameImg");

        $imgSize=getimagesize("../public/images/meals/$nameImg");
        $width=$imgSize[0];
        $height=$imgSize[1];

        $newWidth=400;
        $newHeight=$height/($width/$newWidth);

        if( $typeImg=='image/jpeg' || $typeImg=='image/jpg' ){
            $uploaded=imagecreatefromjpeg("../public/images/meals/$nameImg");
            $thumb=imagecreatetruecolor($newWidth,$newHeight);
            imagecopyresampled($thumb,$uploaded,0,0,0,0,$newWidth,$newHeight,$width,$height);
            imagejpeg($thumb,"../public/images/meals/smaller-images/smaller_".$nameImg,100);
            
        }else{
            $uploaded=imagecreatefrompng("../public/images/meals/$nameImg");
            $thumb=imagecreatetruecolor($newWidth,$newHeight);
            imagecopyresampled($thumb,$uploaded,0,0,0,0,$newWidth,$newHeight,$width,$height);
            imagepng($thumb,"../public/images/meals/smaller-images/smaller_".$nameImg,100);
        } 

    }
    function insertIngredients($ing,$conn,$last_meal_id){
        foreach($ing as $i){
            try{
                $ingExec=$conn->prepare("INSERT INTO ingredients VALUES (NULL,?)");
                $ingExec->execute([$i]);
                $last_ing_id= $conn->lastInsertId();
                insertMealIgredients($last_meal_id,$last_ing_id,$ing,$conn);
            }
            catch(PDOException $ex){
                $conn->rollback();
            }
        }
    }
    
    
    function insertMealIgredients($last_meal_id,$last_ing_id,$ing,$conn){

            try{
                $ingMealExec=$conn->prepare("INSERT INTO menu_ingredients VALUES ($last_meal_id,$last_ing_id)");
                $ingMealExec->execute();
            }
            catch(PDOException $ex){
                $conn->rollback();
            }
        
   
    }
    if(count($errors)){
        http_response_code(422);
        echo json_encode($errors);
    }else{
        // $last_id = $conn->lastInsertId();
        $conn->beginTransaction();

        $queryMeals=$conn->prepare("INSERT INTO menu VALUES (NULL,?,?,?,?)");

        // for($i=0;$i<count($ingredients);$i++){
        //     $queryIngredients=$conn->prepare("INSERT INTO ingredients VALUES (NULL,?)");
        // }
        
        // $queryMealIngr=$conn->prepare("INSERT INTO menu_ingredients VALUES (NULL,?)");

        try{
            $queryMeals->execute([$mealName,$mealPrice,$nameImg,$categoryID]);
            $last_meal_id = $conn->lastInsertId();
            insertIngredients($ing,$conn,$last_meal_id);
           
                $conn->commit();

            http_response_code(201);
            echo json_encode(['message'=> 'Meal added!']);

        }catch(PDOException $ex){
            include_once("../models/functions.php");
            errors($ex->getMessage());
            echo json_encode(['poruka'=> 'Error with database: ' . $ex->getMessage()]);
            http_response_code(500);
            $conn->rollback();
        }
        
    }

    




}

?>



