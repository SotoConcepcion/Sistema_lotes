<?php
// Verifica si se recibieron datos por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se recibieron los datos esperados del formulario
    if (isset($_POST['usuario']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
        // Incluye el archivo de conexión a la base de datos
        include 'conexion.php';

        // Escapa los datos del formulario para evitar inyección SQL
        $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
        $fecha_inicio = mysqli_real_escape_string($conn, $_POST['fecha_inicio']);
        $fecha_fin = mysqli_real_escape_string($conn, $_POST['fecha_fin']);

        // Consulta SQL para insertar los datos en la tabla rentas
        $sql_insertar = "INSERT INTO rentas (Id_usuario, Fecha_inicio, Fecha_fin) VALUES ('$usuario', '$fecha_inicio', '$fecha_fin')";

        // Ejecuta la consulta
        if (mysqli_query($conn, $sql_insertar)) {
            echo "Los datos se han guardado correctamente en la tabla rentas.";
        } else {
            echo "Error al guardar los datos: " . mysqli_error($conn);
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conn);
    } else {
        echo "No se recibieron todos los datos esperados del formulario.";
    }
} else {
    echo "El formulario debe ser enviado por el método POST.";
}
?>
