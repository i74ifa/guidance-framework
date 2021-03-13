<?php

$host = 'localhost';
$type = 'mysql';
$user = 'root';
$pass =  '';
$name_db = 'askific';


$connect = new PDO("$type:host=$host", $user, $pass);