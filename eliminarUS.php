<?php
include("conexion.php");

if(isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    
    // Ejecutar la consulta para eliminar el usuario con el ID proporcionado
    $sql = "DELETE FROM usuario WHERE Id_usuario = $idUsuario";
    $resultado = mysqli_query($conn, $sql);

    if($resultado) {
        echo 'Usuario eliminado correctamente';
        // Puedes devolver cualquier mensaje deseado, este mensaje se mostrará en la alerta en caso de éxito.
    } else {
        echo 'Error al eliminar usuario';
        // Puedes devolver cualquier mensaje deseado, este mensaje se mostrará en la alerta en caso de error.
    }
} else {
    echo 'ID de usuario no proporcionado';
    // Puedes devolver cualquier mensaje deseado, este mensaje se mostrará en la alerta en caso de que no se proporcione el ID del usuario.
}
?>
