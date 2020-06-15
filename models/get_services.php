<?php

    include_once "config/connection.php";

    $query=$conn->query('SELECT * FROM services');
    $services=$query->fetchAll();



?>