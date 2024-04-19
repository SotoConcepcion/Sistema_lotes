<?php
session_start();
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "Proyecto";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener las líneas disponibles
$sql = "SELECT * FROM linea";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Líneas Disponibles - Sistema de Proyecto</title>
    
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
  
  .lote {
    background-color: #e0f2fe;
    border: 1px solid #3c78d8;
    border-radius: 10px;
    padding: 30px; /* Aumento del padding para aumentar el tamaño de la tarjeta */
    transition: all 0.3s ease-in-out;
    margin-bottom: 30px;
    text-align: center; /* Para centrar el contenido */
}

.lote:hover {
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.lote h2 {
    margin-bottom: 0;
    font-size: 24px; /* Aumento del tamaño de la fuente del nombre */
    color: #3c78d8;
}

.lote a {
    text-decoration: none;
    color: inherit;
}

.lote a:hover {
    text-decoration: none;
    color: inherit;
}

@media (min-width: 768px) {
    .col-lg-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    
    /* Para centralizar las tarjetas */
    .row.justify-content-center {
        justify-content: center;
    }
}

</style>


    <div class="container mt-5">
        <h1 class="text-center mb-5">Seleccione una línea</h1>
        <div class="row">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col-lg-2 col-md-4">
                    <div class="lote">
                        <a href="lotes.php?linea=<?php echo $row['Id_linea']; ?>">
                            <h2><?php echo $row['Nombre']; ?></h2>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
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

