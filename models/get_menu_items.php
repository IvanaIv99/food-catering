<?php
include "../config/connection.php";
header("Content-type:applications/json");
    $query="SELECT * FROM menu";
    $result=$conn->query($query,PDO::FETCH_OBJ)->fetchAll();
    echo json_encode($result);

?>