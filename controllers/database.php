<?php

// $servername = "localhost";
// $username = "root";
// $password = "";                           
// $database = "compu";

$servername = "161.132.18.108";
$username = "fworoobt_joe";
$password = "d914J;Ez9b]Z";                           
$database = "fworoobt_com";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexion a la base de datos fallo: " . $conn->connect_error);
}

?>
