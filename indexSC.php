<?php
// Verificar la conexión a la base de datos
require_once("conexion.php");
session_start(); // Iniciar sesión

$error_message = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombreUsuario = $_POST['nombre_usuario'];
    $contrasenia = $_POST['contrasenia'];

    // Consulta SQL utilizando prepared statements
    $query = "SELECT * FROM usuario WHERE Nombre_usuario = ?";
    
    // Preparar la consulta
    $stmt = $conn->prepare($query);
    
    // Bind de parámetros
    $stmt->bind_param('s', $nombreUsuario);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener el resultado
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    
    // Verificar si se encontró un usuario
    if ($usuario) {
        // Verificar la contraseña
        if ($contrasenia === $usuario['Contrasenia']) { // Aquí deberías usar una función de hash segura
            $idPuesto = $usuario['Id_puesto'];
            $_SESSION['Id_usuario'] = $usuario['Id_usuario']; // Configurar la variable de sesión
            setcookie("usuario",$nombreUsuario);
            // Redireccionar según el tipo de usuario
            switch ($idPuesto) {
                case 1:
                    header("Location: http://localhost/comp/cliente/inicio.php");
                    exit();
                case 2:
                    header("Location: http://localhost/comp/vendedor/indexLT.php");
                    exit();
                case 3:
                    header("Location: http://localhost/comp/administrador/indexLT.php");
                    exit();
                default:
                    header("Location: http://localhost/comp/error.html");
                    exit();
            }
        } else {
            $error_message = "Usuario o contraseña incorrectos"; 
        }
    } else {
        $error_message = "Usuario o contraseña incorrectos"; 
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - PubliciMex</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        #main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            max-width: 90%;
            text-align: center;
        }

        h1 {
            margin-bottom: 30px;
            color: #333333;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #4caf50;
        }

        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 20px;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 100px; /* Ajusta el tamaño según necesites */
            height: auto;
        }
    </style>
</head>
<body>
<div id="main">
    <div id="login-container">
        <img class="logo" src="img/logo.gif" alt="Logo">
        <h1>Iniciar Sesión</h1>
        <form method="post" action="">
            <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
            <input type="password" name="contrasenia" placeholder="Contraseña" required>
            <input type="submit" value="Ingresar">
            <?php if(!empty($error_message)) { ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php } ?>
        </form>
    </div>
</div>
</body>
</html>