<?php
include 'conexion.php';

// Verifica si se recibe el parámetro de ID de renta
if (isset($_GET['id'])) {
    // Escapa el ID de renta para evitar inyección SQL
    $id_renta = mysqli_real_escape_string($conn, $_GET['id']);

    // Consulta SQL para eliminar la renta con el ID especificado
    $sql_eliminar = "DELETE FROM rentas WHERE Id_renta = '$id_renta'";

    if (mysqli_query($conn, $sql_eliminar)) {
        echo "Renta eliminada correctamente.";
    } else {
        echo "Error al eliminar renta: " . mysqli_error($conn);
    }
} else {
    echo "No se proporcionó un ID de renta.";
}

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>
