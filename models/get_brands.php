<?php

    include_once "config/connection.php";

    $query=$conn->query('SELECT * FROM brands');
    $brands=$query->fetchAll();



?>