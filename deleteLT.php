<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["borrar"])) {
    if (isset($_POST['eliminar']) && !empty($_POST['eliminar'])) {
        // Incluir el código de conexión
        include 'conexion.php';

        foreach ($_POST['eliminar'] as $id) {
            $id = $conn->real_escape_string($id); // Evitar inyección SQL

            // Realiza la eliminación de la fila correspondiente
            $sql = "DELETE FROM lote WHERE lote.Id_lote = '$id'";
            if ($conn->query($sql) !== TRUE) {
                echo "Error al eliminar el registro con ID $id: " . $conn->error;
            }
        }
        $conn->close();

        header("Location: indexLT.php");
        exit();
    } else {
        echo "Por favor, selecciona al menos un elemento para eliminar.";
    }
}
?>
