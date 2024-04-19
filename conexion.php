<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Proyecto";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_errno) {
    echo "Error al conectar a la base de datos: " . $conn->connect_error;
    exit();
}
?>
