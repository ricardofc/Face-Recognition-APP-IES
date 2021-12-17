<?php
$host="localhost";
$user="root";
$password="";
$database="My_college";
$connection = new mysqli($host, $user, $password, $database);
if ($connection->connect_error) 
	die("Access problem database: " . $connection->connect_error);
$connection->set_charset('utf8');
?>
