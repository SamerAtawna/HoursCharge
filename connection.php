<?php 

$dbname="HoursCharge";
$username="root";
$password="";
$server="localhost";

    $connect = new mysqli($server, $username, $password, $dbname);

    
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>
