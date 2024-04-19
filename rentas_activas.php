<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentas del Usuario</title>
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
            padding: 30px 0;
            height: 120px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f2f2f2;
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

        h2 {
            margin-top: 0;
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
            <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <h2>Rentas del Usuario</h2>
    <?php
    session_start(); // Asegúrate de que la sesión esté iniciada

    // Establecer la conexión con la base de datos
    $servername = "localhost"; // Cambia esto por el nombre del servidor de tu base de datos
    $username = "root"; // Cambia esto por tu nombre de usuario de la base de datos
    $password = ""; // Cambia esto por tu contraseña de la base de datos
    $dbname = "proyecto"; // Cambia esto por el nombre de tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    $usuario=$_COOKIE["usuario"];

    // Consulta SQL para obtener las rentas del usuario actual
    $sql = "SELECT * FROM rentas WHERE usuario='$usuario'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los datos en una tabla HTML
        echo "<table><tr><th>ID Renta</th><th>ID Usuario</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>Nombres Agregados</th><th>Usuario</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["Id_renta"]."</td><td>".$row["Id_usuario"]."</td><td>".$row["Fecha_inicio"]."</td><td>".$row["Fecha_fin"]."</td><td>".$row["nombres_agregados"]."</td><td>".$row["usuario"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "La tabla rentas está vacía.";
    }

    // Cerrar conexión
    $conn->close();
    ?>
</div>

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
