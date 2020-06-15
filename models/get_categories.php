<?php

    include_once "config/connection.php";

    $query=$conn->query('SELECT * FROM categories');
    $categories=$query->fetchAll();



?>