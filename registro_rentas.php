<?php
include("conexion.php");

// Verificar si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han seleccionado lotes
    if(isset($_POST['seleccionados']) && !empty($_POST['seleccionados'])) {
        // Obtener el usuario y las fechas del formulario
        $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
        $fecha_inicio = mysqli_real_escape_string($conn, $_POST['fecha_inicio']);
        $fecha_fin = mysqli_real_escape_string($conn, $_POST['fecha_fin']);
        
        // Variable para almacenar los lotes seleccionados
        $lotes_seleccionados = $_POST['seleccionados'];

        // Insertar la renta en la base de datos
        $sql_renta = "INSERT INTO renta (Id_usuario, Fecha_inicio, Fecha_fin) VALUES ('$usuario', '$fecha_inicio', '$fecha_fin')";
        $query_renta = mysqli_query($conn, $sql_renta);

        // Verificar si la renta se insertó correctamente
        if ($query_renta) {
            // Obtener el ID de la renta recién insertada
            $id_renta = mysqli_insert_id($conn);
            
            // Insertar los lotes seleccionados en la tabla de detalles de renta
            foreach($lotes_seleccionados as $lote) {
                $sql_detalle_renta = "INSERT INTO renta (Id_renta, Id_lote) VALUES ('$id_renta', '$lote')";
                $query_detalle_renta = mysqli_query($conn, $sql_detalle_renta);
            }

            if ($query_detalle_renta) {
                echo "La renta se registró correctamente.";
            } else {
                echo "Error al registrar los detalles de la renta: " . mysqli_error($conn);
            }
        } else {
            echo "Error al registrar la renta: " . mysqli_error($conn);
        }
    } else {
        echo "No se han seleccionado lotes.";
    }
} else {
    echo "Acceso denegado.";
}
?>
