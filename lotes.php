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

// Obtener la línea seleccionada
if(isset($_GET['linea'])) {
    $linea_id = $_GET['linea'];

    // Obtener las estaciones de la línea seleccionada
    $sql_estaciones = "SELECT * FROM estacion WHERE Id_linea = $linea_id";
    $result_estaciones = $conn->query($sql_estaciones);
}

// Obtener los lotes de la estación seleccionada con su respectivo precio y nombre
if(isset($_GET['estacion'])) {
    $estacion_id = $_GET['estacion'];

    $sql = "SELECT lote.Id_status, dimensiones.Precio, dimensiones.Medidas, lote.Nombre_lote AS NombreLote
            FROM lote 
            INNER JOIN dimensiones ON lote.Id_dimension = dimensiones.Id_dimension 
            WHERE lote.Id_estacion = '$estacion_id' AND lote.Id_status IN (SELECT Id_status FROM status WHERE Estado = 'DISPONIBLE')";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotes Disponibles - Sistema de Rentas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            text-align: center;
        }

        h1 {
            color: #3c78d8; /* Azul más intenso */
            font-weight: bold;
        }

        .lote {
            background-color: #ffffff;
            border: 2px solid #3c78d8;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease-in-out;
            height: 250px; /* Aumentar altura de la tarjeta */
        }

        .lote h2 {
            color: #3c78d8;
            font-size: 22px; /* Aumentar tamaño del nombre */
            font-weight: bold; /* Hacer que el nombre resalte */
        }

        .lote p {
            font-size: 16px; /* Aumentar tamaño del texto */
            color: #666;
        }

        .animar {
            animation: fadeInUp 0.8s ease-in-out;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        
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

    <div class="container mt-5">
        <?php if(isset($linea_id)): ?>
            <h1 class="text-center mb-5">Lotes Disponibles - Línea <?php echo $linea_id; ?></h1>
            <div class="row">
                <?php if(isset($result_estaciones) && $result_estaciones->num_rows > 0): ?>
                    <div class="col-lg-6 offset-lg-3">
                        <form action="lotes.php" method="get">
                            <div class="form-group">
                                <label for="estacion">Seleccione una estación:</label>
                                <select class="form-control" id="estacion" name="estacion">
                                    <?php while($row_estacion = $result_estaciones->fetch_assoc()): ?>
                                        <?php if(isset($_GET['estacion']) && $_GET['estacion'] == $row_estacion['Id_estacion']): ?>
                                            <option value="<?php echo $row_estacion['Id_estacion']; ?>" selected><?php echo $row_estacion['Nombre']; ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $row_estacion['Id_estacion']; ?>"><?php echo $row_estacion['Nombre']; ?></option>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <input type="hidden" name="linea" value="<?php echo $linea_id; ?>">
                            <button type="submit" class="btn btn-primary">Mostrar Lotes</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="row mt-5">
            <?php if(isset($result) && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="lote animar">
                            <h2><?php echo $row['NombreLote']; ?></h2>
                            <p>Medidas: <?php echo $row['Medidas']; ?></p>
                            <p>Precio: $<?php echo $row['Precio']; ?> mensuales</p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
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
