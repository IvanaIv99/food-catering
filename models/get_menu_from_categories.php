<?php
include "../config/connection.php";
header("Content-type:applications/json");

    if(isset($_POST['categID'])){
        $categID=$_POST['categID'];
       
        $query="SELECT * FROM menu WHERE categoryID=$categID";
        $result=$conn->query($query,PDO::FETCH_OBJ)->fetchAll();
        echo json_encode($result);
        
    }
    
?>