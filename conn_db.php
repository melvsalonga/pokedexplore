<?php

$sname="localhost";
$unmae="root";
$password="parag0n";

$database_name = "local_db";

$conn = mysqli_connect($sname, $unmae, $password, $database_name);

if (!$conn){
    echo "Connection to database failed!";

}