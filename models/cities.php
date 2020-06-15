<?php

    if(isset($_POST["country"])){
    
    include "../config/connection.php";
    
    header("Content-type:application/json");
    
    $countryID=$_POST["country"];

    $upitIspis="SELECT * FROM cities WHERE countryID=$countryID";
    $rezultat = $conn-> query($upitIspis);

     $podaci = $rezultat->fetchAll();

    echo(json_encode($podaci));

    }
  

?>