<?php
session_start(); // Asegúrate de que la sesión esté iniciada

// Verificar la conexión a la base de datos
include("conexion.php");

// Variable para almacenar mensajes de error
$error_message = '';
$usuario=$_COOKIE["usuario"];
// Verificar si el usuario está autenticado
if(isset($usuario)) {
    // Consulta para obtener los datos del usuario
    $query = "SELECT * FROM usuario WHERE Id_usuario = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_SESSION['Id_usuario']);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Obtener los datos del usuario
    if($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $Nombre = $fila['Nombre'];
        $ApellidoPaterno = $fila['Apellido_P'];
        $ApellidoMaterno = $fila['Apellido_M'];
        $Telefono = $fila['Telefono'];
        $Correo = $fila['Correo'];
        $Nombre_usuario = $fila['Nombre_usuario'];
        $Contrasenia = $fila['Contrasenia'];
        $Empresa = $fila['Empresa'];
        // Obtener otros datos del usuario si es necesario
    } else {
        // Si no se encontró el usuario, redirigir a la página de inicio de sesión
        header("Location: ../indexSC.php");
        exit;
    }

    // Si se envió un nuevo valor para la contraseña
    if(isset($_POST['nuevacontrasenia'])) {
        $nuevacontrasenia = $_POST['nuevacontrasenia'];
        $confirmarcontrasenia = $_POST['confirmarcontrasenia'];

        // Validar la contraseña
        if($nuevacontrasenia !== $confirmarcontrasenia) {
            $error_message = "Las contraseñas no coinciden.";
        } elseif(strlen($nuevacontrasenia) < 8) {
            $error_message = "La contraseña debe tener al menos 8 caracteres.";
        } else {
            // Actualizar la contraseña en la base de datos
            $query = "UPDATE usuario SET Contrasenia = '$nuevacontrasenia' WHERE  Nombre_usuario = '$usuario'";
        $ok = mysqli_query($conn,$query);
            if($ok){
                $error_message = "Actualizado";
            }
            
        }
    }
} else {
    // Si no se ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: iniciar_sesion.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 20px;
            background-color: #f2f2f2;
        }

        header, footer {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            font-size: 20px;
            padding: 20px 0;
            height: 80px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 30px;
            font-size: 20px;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #0056b3;
        }

        .container {
            max-width: 800px;
            margin: 80px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #333333;
        }

        .image-section {
            text-align: center;
            margin-top: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-section img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid #007bff;
            transition: transform 0.3s ease-in-out;
            margin: 0 10px;
        }

        .image-section img:hover {
            transform: scale(1.1);
        }

        .social-icons a {
            display: inline-block;
            margin: 0 10px;
        }

        .social-icons img {
            width: 30px;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .social-icons a:hover img {
            transform: scale(1.2);
        }
   
        .container {
            max-width: 800px;
            margin: 80px auto 10px;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #007bff;
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-size: 18px;
            color: #007bff;
        }
        td {
            font-size: 16px;
            color: #333;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 10px;
            width: calc(100% - 22px);
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .btn-editar {
            background-color: #28a745;
        }
        .btn-editar:hover {
            background-color: #218838;
        }
        /* Estilos para el contenedor de la foto de perfil */
        #foto-perfil {
            width: 150px;
            height: 150px;
            background-color: #ddd; /* Color de fondo por defecto */
            border-radius: 50%; /* Para hacerlo circular */
            background-size: cover;
            background-position: center;
            margin-bottom: 20px;
            margin: 0 auto; /* Centrar */
        }
        .foto-container {
            text-align: center;
        }
        
        /* Centrar botones */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

    </style>
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="lotesindex.php">Lotes</a></li>
           
                <li><a href="rentas_activas.php">Mis Rentas</a></li>
            
            <li><a href="mi_cuenta.php">Mi cuenta</a></li>
            <li><a href="../indexSc.php">Cerrar sesión</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Mi Cuenta</h1>
   
    <!-- Sección para mostrar mensajes de error -->
    <?php if(!empty($error_message)): ?>
        <div style="color: red;"><?php echo $error_message; ?></div>
    <?php endif; ?>
   
    <table>
        <tr>
            <td>Nombre de Usuario:</td>
            <td><?php echo $Nombre_usuario; ?></td>
        </tr>
        <tr>
            <td>Nombre:</td>
            <td><?php echo $Nombre; ?></td>
        </tr>
        <tr>
            <td>Apellido Paterno:</td>
            <td><?php echo $ApellidoPaterno; ?></td>
        </tr>
        <tr>
            <td>Apellido Materno:</td>
            <td><?php echo $ApellidoMaterno; ?></td>
        </tr>
        <tr>
            <td>Teléfono:</td>
            <td><?php echo $Telefono; ?></td>
        </tr>
        <tr>
            <td>Correo:</td>
            <td><?php echo $Correo; ?></td>
        </tr>
        <tr>
            <td>Empresa:</td>
            <td><?php echo $Empresa; ?></td>
        </tr>
        <tr>
            <td>Contraseña:</td>
            <td>
                <input type="password" id="contrasenia" value="<?php echo $Contrasenia; ?>" disabled>
                <button onclick="editarcontrasenia()">Editar contraseña</button>
            </td>
        </tr>
    </table>
    <div id="form-contrasenia" style="display: none;">
        <form method="post" action="">
            <input type="password" name="nuevacontrasenia" placeholder="Nueva contraseña" required maxlength="8"><br>
            <input type="password" name="confirmarcontrasenia" placeholder="Confirmar contraseña" required maxlength="8"><br>
            <input type="submit" value="Guardar contraseña">
        </form>
    </div>
</div>

<script>
    function editarcontrasenia() {
        document.getElementById('contrasenia').disabled = true;
        document.getElementById('form-contrasenia').style.display = 'block';
    }
</script>

<footer>
    <p>Contacto: info@mexibus.com | Teléfono: 123-456-7890</p>
    <div class="social-icons">
        <a href="#" class="social-icon"><img src="face.ico" alt="Facebook"></a>
        <a href="#" class="social-icon"><img src="twi.ico" alt="Twitter"></a>
        <a href="#" class="social-icon"><img src="insta.ico" alt="Instagram"></a>
    </div>
</footer>
</body>
</html>
