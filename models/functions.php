<?php

    function validation($regex,$data,$string){
        if(!preg_match($regex,$data)){
            $errors[]="$string is invalid!";
        }
    }

    function errors($error){
        require_once "../config/config.php";
        @$open=fopen(ERROR_FAJL,"a");
        $unos=$error."\t".date('d-m-Y H:i:s')."\n";
        @fwrite($open,$unos);
        @fclose($open);
    }

?>