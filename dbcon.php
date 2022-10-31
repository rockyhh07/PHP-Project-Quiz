<?php

$con = mysqli_connect("localhost","admin","admin123","empdb");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

?>