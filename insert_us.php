<?php
include("conexion.php");

// Verificar si se recibieron los datos del formulario
if(isset($_POST['Submit'])) {
    // Recoger los datos del formulario y evitar inyección SQL utilizando prepared statements
    $Nombre = $_POST['NOMBRE'];
    $ApellidoP = $_POST['APELLIDO_P'];
    $ApellidoM = $_POST['APELLIDO_M'];
    $Nombre_usuario = $_POST['NOMBRE_USUARIO'];
    $Telefono = $_POST['TELEFONO'];
    $Correo = $_POST['CORREO'];
    $Contrasenia = $_POST['CONTRASENIA'];
    $Empresa = $_POST['EMPRESA'];
    $IdPuesto = $_POST['ID_PUESTO'];

    // Verificar si el nombre de usuario ya está en uso
    $stmt_check_username = $conn->prepare("SELECT * FROM usuario WHERE Nombre_usuario = ?");
    $stmt_check_username->bind_param("s", $Nombre_usuario);
    $stmt_check_username->execute();
    $result_check_username = $stmt_check_username->get_result();

    if($result_check_username->num_rows > 0) {
        // Si el nombre de usuario ya está en uso, mostrar una alerta y redireccionar a agregarUS.php
        echo '<script>alert("El nombre de usuario ya está en uso. Por favor, elige otro nombre de usuario."); window.location.href = "agregarUS.php";</script>';
    } else {
        // El nombre de usuario no está en uso, proceder con la inserción
        // Query para insertar los datos en la base de datos utilizando prepared statements para evitar inyección SQL
        $sql = "INSERT INTO usuario (Nombre, Apellido_P, Apellido_M, Nombre_usuario, Telefono, Correo, Contrasenia, Empresa, Id_puesto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Preparar la declaración
        $stmt = $conn->prepare($sql);
        
        // Vincular los parámetros con los valores
        $stmt->bind_param("ssssssssi", $Nombre, $ApellidoP, $ApellidoM, $Nombre_usuario, $Telefono, $Correo, $Contrasenia, $Empresa, $IdPuesto);
        
        // Ejecutar la declaración
        if ($stmt->execute()) {
            // Si la inserción fue exitosa, mostrar alerta y redirigir a indexUS.php
            echo '<script>alert("Usuario agregado correctamente."); window.location.href = "indexUS.php";</script>';
        } else {
            // Si hubo un error en la inserción, mostrar mensaje de error
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Cerrar la declaración
        $stmt->close();
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
