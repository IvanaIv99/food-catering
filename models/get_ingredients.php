
<?php

    include "../config/connection.php";
    header("Content-type:applications/json");

        if(isset($_POST['menuID'])){

            $menuID=$_POST['menuID'];

            $query="SELECT name from menu_ingredients as im INNER JOIN ingredients as i ON im.ingredientsID=i.ingredientsID where im.menuID=$menuID";
            $result=$conn->query($query,PDO::FETCH_OBJ)->fetchAll();

            echo json_encode($result);
        }
        

    
?>