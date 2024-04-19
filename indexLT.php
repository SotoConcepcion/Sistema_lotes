<?php
include("conexion.php");

$status_desc = array(
    '1D' => "Disponible",
    '2R' => "Rentado",
    '3M' => "Mantenimiento"
);

// Consulta SQL para filtrar por estado
$sql_estado = "SELECT lote.Id_lote, lote.Nombre_lote, lote.Id_dimension, lote.Id_status, dimensiones.Medidas, dimensiones.Precio, estacion.Nombre, status.Estado
    FROM lote 
    INNER JOIN dimensiones ON lote.Id_dimension = dimensiones.Id_dimension 
    INNER JOIN status ON lote.Id_status = status.Id_status
    LEFT JOIN estacion ON lote.Id_estacion = estacion.Id_estacion";

// Condición WHERE para filtrar por estado
if(isset($_POST['filtro_estado']) && $_POST['filtro_estado'] !== '') {
    $filtro_estado = mysqli_real_escape_string($conn, $_POST['filtro_estado']);
    $sql_estado .= " WHERE lote.Id_status = '$filtro_estado'";
}

// Consulta SQL para búsqueda por nombre de lote o estación
$sql_busqueda = "SELECT lote.Id_lote, lote.Nombre_lote, lote.Id_dimension, lote.Id_status, dimensiones.Medidas, dimensiones.Precio, estacion.Nombre, status.Estado
    FROM lote 
    INNER JOIN dimensiones ON lote.Id_dimension = dimensiones.Id_dimension 
    INNER JOIN status ON lote.Id_status = status.Id_status
    LEFT JOIN estacion ON lote.Id_estacion = estacion.Id_estacion";

// Condición WHERE para búsqueda por nombre de lote o estación
if(isset($_POST['filtro_nombre']) && !empty($_POST['filtro_nombre'])) {
    $filtro_nombre = mysqli_real_escape_string($conn, $_POST['filtro_nombre']);
    $sql_busqueda .= " WHERE lote.Nombre_lote LIKE '%$filtro_nombre%' OR estacion.Nombre LIKE '%$filtro_nombre%'";
}

$sql_estado .= " ORDER BY lote.Id_lote ASC";
$query_estado = mysqli_query($conn, $sql_estado);

// Consulta SQL para obtener todos los elementos si no se ha aplicado filtro de estado
if(!isset($_POST['filtro_estado']) || $_POST['filtro_estado'] === '') {
    $sql_todos = "SELECT lote.Id_lote, lote.Nombre_lote, lote.Id_dimension, lote.Id_status, dimensiones.Medidas, dimensiones.Precio, estacion.Nombre, status.Estado
    FROM lote 
    INNER JOIN dimensiones ON lote.Id_dimension = dimensiones.Id_dimension 
    INNER JOIN status ON lote.Id_status = status.Id_status
    LEFT JOIN estacion ON lote.Id_estacion = estacion.Id_estacion
    ORDER BY lote.Id_lote ASC";
    $query_todos = mysqli_query($conn, $sql_todos);
}

// Resto del código...
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PubliciMex</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #bcdcec ;
        }
        #header {
            background-color: #4CAF50;
            background: #33AAFF;
            padding: 10px;
            text-align: center;
        }
        #menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        #menu li {
            display: inline;
            margin-right: 20px;
        }
        #menu li a {
            color: #ffffff;
            text-decoration: none;
        }
        #main {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            background-color: #bcdcec ;
        }
        #content {
            width: 70%;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-right: 20px;
        }
        .titulo_centro {
            text-align: center;
            margin-bottom: 20px;
        }
        .select-bar {
            margin-bottom: 20px;
        }
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card-content {
            margin-top: 10px;
        }
        .card-title {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
        }
        .card-text {
            font-weight: bold;
            font-size: 14px;
            color: black;
            margin-top: 5px;
        }
        #sidebar {
            width: 30%;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
        }
        #sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        #sidebar form {
            display: flex;
            flex-direction: column;
        }
        #sidebar label {
            margin-top: 10px;
            font-weight: bold;
        }
        #sidebar input[type="text"],
        #sidebar input[type="date"],
        #sidebar input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #sidebar input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        #sidebar input[type="submit"]:hover {
            background-color: #45a049;
        }
        #footer {
            text-align: center;
            margin-top: 20px;
        }
        #sidebar {
        position: sticky;
        top: 200px; 
        width: 30%;
        background-color: #ffffff;
        border-radius: 8px;
        padding: 20px;
        }
        #header {
        position: sticky;
        top: 0;
        z-index: 1000; 
        width: 100%;
        background-color: #4CAF50;
        padding: 20px;
        text-align: center;
        transition: padding 0.3s; 
        }
        #header.shrink {
        padding: 2px; 
        }
    </style>
</head>

<body>
    <div id="header"> 
        <a href="" class="logo"><img src="img/logo.gif" width="100" height="100px" alt="" /></a> 
        <ul id="menu">
            <li class="active"><a href="indexLT.php">Lotes publicitarios</a></li>
            <li><span><span><a href="procesar_renta.php">Rentas Activas</a></span></span></li>
            <li><a href="indexUS.php">Usuarios Registrados en el Sistema</a></li>
            <li><a href="../indexSC.php">Cerrar Sesión</a></li>
        </ul>
    </div>
    <div id="main">
        <div id="content">
            <div class="titulo_centro"> 
                <h1>Lotes disponibles</h1>
            </div>
            <div class="select-bar">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  
                </form>
                <br><br>
                <div id="select-bar">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
                        <label for="filtro_estado">Seleccionar Estado:</label>
                        <select id="filtro_estado" name="filtro_estado">
                            <option value="">Todos</option>
                            <option value="1D">Disponible</option>
                            <option value="2R">Rentado</option>
                            <option value="3M">Mantenimiento</option>
                        </select>
                        <input type="submit" value="Filtrar">
                    </form>
                </div>
            </div>
            <!-- Sección de tarjetas de lotes disponibles -->
            <div class="card-container">
                <?php 
                if (isset($query_estado) && !empty($query_estado)) { 
                    while($row=mysqli_fetch_array($query_estado)) { 
                ?>
                <div class="card">
                    <input type="checkbox" name="seleccionados[]" value="<?php echo $row["Id_lote"] ?>">
                    <div class="card-content">
                        <div class="card-title">Nombre de lote: <?php echo isset($row['Nombre_lote']) ? $row['Nombre_lote'] : '' ?></div>
                        <div class="card-text">Estación: <?php echo isset($row['Nombre']) ? $row['Nombre'] : '' ?></div>
                        <div class="card-text">Dimensiones: <?php echo isset($row['Medidas']) ? $row['Medidas'] : '' ?></div>
                        <div class="card-text">Estado: <?php echo isset($row['Estado']) ? $row['Estado'] : '' ?></div>
                        <div class="card-text">Precio: <?php echo isset($row['Precio']) ? $row['Precio'] : '' ?></div>
                        <br>
                        <a href="actualizarLT.php?id=<?php echo $row['Id_lote'] ?>">Actualizar</a>
                        <br>
                        <br>
                        <a href="#" class="agregar" data-nombre="<?php echo isset($row['Nombre_lote']) ? htmlspecialchars($row['Nombre_lote'] . ' - ' . $row['Nombre']) : '' ?>">Agregar</a>
                    </div>
                </div>
                <?php 
                    } 
                } else {
                    echo "No se encontraron resultados.";
                }
                ?>
            </div>
            <!-- Formulario para eliminar y enviar lotes seleccionados -->
            <form method="post" action="registro_rentas.php">
                <?php 
                if(isset($_POST['seleccionados'])) { 
                    foreach($_POST['seleccionados'] as $selected) { 
                ?>
                <input type="hidden" name="seleccionados[]" value="<?php echo $selected ?>">
                <?php 
                    } 
                } 
                ?>
                
            </form>
            <a href="agregarLT.php"><input type="submit" name="Submit" value="Agregar Lote"/></a>
        </div>
        <!-- Barra lateral -->
        <div id="sidebar">
            <h2>Crear Renta</h2>
            <form method="post" action="procesar_renta.php">
                <!-- Campo oculto para almacenar nombres de lotes seleccionados -->
                <input type="hidden" id="nombres_seleccionados" name="nombres_seleccionados">
                <div id="nombres_agregados"></div>
                <label for="usuario">Usuario:</label>
                <select id="usuario" name="usuario" required>
                    <?php
                    $sql_usuarios = "SELECT * FROM usuario WHERE Id_puesto = 1";
                    $query_usuarios = mysqli_query($conn, $sql_usuarios);
                    if ($query_usuarios && mysqli_num_rows($query_usuarios) > 0) {
                        while ($usuario = mysqli_fetch_assoc($query_usuarios)) {
                            echo '<option value="' . $usuario['Id_usuario'] . '">' . $usuario['Nombre_usuario'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No se encontraron usuarios</option>';
                    }
                    ?>
                </select>
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" required>
                <label for="fecha_fin">Fecha de fin:</label>
                <input type="date" id="fecha_fin" name="fecha_fin" required>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
    <div id="footer">
        <!-- Pie de página -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Código JavaScript
            // Event listener para el botón "Agregar" en las tarjetas de lotes
            var nombresLotes = new Set();
            var agregarEnlaces = document.querySelectorAll('.agregar');
            agregarEnlaces.forEach(function(enlace) {
                enlace.addEventListener('click', function(event) {
                    event.preventDefault();
                    var nombreLote = enlace.getAttribute('data-nombre');
                    nombresLotes.add(nombreLote);
                    actualizarNombresAgregados();
                    document.getElementById('nombres_seleccionados').value = JSON.stringify(Array.from(nombresLotes));
                    document.getElementById('formulario').scrollIntoView({ behavior: 'smooth' });
                });
            });

            // Función para actualizar los nombres de lotes agregados
            function actualizarNombresAgregados() {
                var nombresAgregadosInput = document.getElementById('nombres_seleccionados');
                nombresAgregadosInput.value = Array.from(nombresLotes).join(', ');

                var nombresAgregadosDiv = document.getElementById('nombres_agregados');
                nombresAgregadosDiv.innerHTML = Array.from(nombresLotes).join('<br>');
            }
        });
    </script>
</body>
</html>
