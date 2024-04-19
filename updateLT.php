<?php
include("conexion.php");

// Verificar si se recibió el ID del lote a actualizar
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar si se enviaron datos para actualizar
    if(isset($_POST['Nombre_lote']) && isset($_POST['Id_estacion']) && isset($_POST['Id_dimension']) && isset($_POST['Id_status'])) {
        // Obtener los datos del formulario y escaparlos para evitar inyecciones SQL
        $Nombre_lote = mysqli_real_escape_string($conn, $_POST['Nombre_lote']);
        $Id_estacion = mysqli_real_escape_string($conn, $_POST['Id_estacion']);
        $Id_dimension = mysqli_real_escape_string($conn, $_POST['Id_dimension']);
        $Id_status = mysqli_real_escape_string($conn, $_POST['Id_status']);

        // Construir la consulta SQL para actualizar los datos del lote
        $sql = "UPDATE lote SET Nombre_lote='$Nombre_lote', Id_estacion='$Id_estacion', Id_dimension='$Id_dimension', Id_status='$Id_status' WHERE ID_lote='$id'";

        // Ejecutar la consulta
        $query = mysqli_query($conn, $sql);

        if($query) {
            // Redirigir a la página principal después de la actualización
            header("Location: indexLT.php");
            exit(); // Salir del script después de redirigir
        } else {
            echo "Error al actualizar los datos del lote: " . mysqli_error($conn);
        }
    } else {
        echo "No se proporcionaron todos los datos necesarios para actualizar.";
    }
} else {
    echo "No se proporcionó un ID de lote para actualizar.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
