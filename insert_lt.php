<?php
include("conexion.php");

$Id_lote = mysqli_real_escape_string($conn, $_POST['ID_LOTE']);
$Nombre_lote = mysqli_real_escape_string($conn, $_POST['NOMBRE']);
$Id_estacion = mysqli_real_escape_string($conn, $_POST['ID_ESTACION']);
$Id_dimension = mysqli_real_escape_string($conn, $_POST['ID_DIMENSION']);
$Id_status = mysqli_real_escape_string($conn, $_POST['ID_STATUS']);

// Verificar si todos los campos tienen valores válidos
if ($Id_lote != "" && $Nombre_lote != "" && $Id_estacion != "" && $Id_dimension != "" && $Id_status != "") {
    // Insertar nuevo registro si no hay duplicados
    $sql = "INSERT INTO lote (Id_lote, Nombre_lote, Id_estacion, Id_dimension, Id_status) VALUES ('$Id_lote', '$Nombre_lote', '$Id_estacion', '$Id_dimension', '$Id_status')";
    if (mysqli_query($conn, $sql)) {
        header("location:indexLT.php");
        exit; // Detener la ejecución del script después de redirigir
    } else {
        echo "Error al insertar el nuevo lote: " . mysqli_error($conn);
    }
} else {
    echo "Por favor, completa todos los campos.";
}

mysqli_close($conn);
?>
