<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demo4_palgue";

    try{
        $connect = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $connect->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

    }catch(PDOException $exc){
        echo "Connection Failed: $exc";
    }

?>