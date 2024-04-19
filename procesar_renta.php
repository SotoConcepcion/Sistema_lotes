<?php
// Verifica si se recibieron datos por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluye el archivo de conexión a la base de datos
    include 'conexion.php';

    // Escapa los datos del formulario para evitar inyección SQL
    $id_usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $fecha_inicio = mysqli_real_escape_string($conn, $_POST['fecha_inicio']);
    $fecha_fin = mysqli_real_escape_string($conn, $_POST['fecha_fin']);

    // Obtiene los nombres agregados desde el formulario (si los hay)
    $nombres_agregados_json = isset($_POST['nombres_seleccionados']) ? $_POST['nombres_seleccionados'] : '[]';
    $nombres_agregados = json_decode($nombres_agregados_json, true);

    // Convierte el array de nombres a una cadena separada por comas para almacenar en la base de datos
    $nombres_agregados_str = implode(', ', $nombres_agregados);

    // Consulta SQL para obtener el nombre de usuario
    $sql_nombre_usuario = "SELECT Nombre_usuario FROM usuario WHERE Id_usuario = '$id_usuario'";
    $resultado_nombre = mysqli_query($conn, $sql_nombre_usuario);

    if ($resultado_nombre && mysqli_num_rows($resultado_nombre) > 0) {
        $fila_usuario = mysqli_fetch_assoc($resultado_nombre);
        $nombre_usuario = $fila_usuario['Nombre_usuario'];

        // Consulta SQL para insertar los datos en la tabla rentas
        $sql_insertar = "INSERT INTO rentas (Id_usuario, Usuario, Nombres_agregados, Fecha_inicio, Fecha_fin) VALUES ('$id_usuario', '$nombre_usuario', '$nombres_agregados_str', '$fecha_inicio', '$fecha_fin')";

        // Ejecuta la consulta
        if (mysqli_query($conn, $sql_insertar)) {
            // Cambiar el estado de los lotes seleccionados a "rentados"
            foreach ($nombres_agregados as $nombre_lote) {
                // Cambiar el estado de los lotes seleccionados a "Rentado" (utilizando '2R' como identificador)
                $sql_update_lote = "UPDATE lote SET Id_status = '2R' WHERE Nombre_lote = '$nombre_lote'";
                if (!mysqli_query($conn, $sql_update_lote)) {
                    echo "Error al actualizar el estado del lote: " . mysqli_error($conn);
                    // Puedes manejar el error aquí de acuerdo a tus necesidades
                }
            }
            

            // Redirección usando GET después de guardar los datos
            header("Location: {$_SERVER['REQUEST_URI']}?success=true");
            exit();
        } else {
            echo "Error al guardar los datos: " . mysqli_error($conn);
        }
    } else {
        echo "El usuario con el ID '$id_usuario' no se encontró en la base de datos.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conn);
} else {
    echo "";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Rentas</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #bcdcec ;
        }
        #header {
            background-color: #4CAF50;
            padding: 20px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .action-btn {
            padding: 8px 12px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        .action-btn:hover {
            background-color: #45a049;
        }
        #btn-regresar {
            position: fixed;
            bottom: 20px; 
            right: 20px; 
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: none; 
            z-index: 999; 
        }
        .container{
            background-image: url('img/bg-center-column.jpg'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;
            margin-left: 80px;
            margin-right: 80px;
            border-radius: 30px;
            padding-top: 10px;
            padding-right: 20px;
            padding-left: 20px;
        }
    </style>
    </head>
<body>
<div id="header"> 
        <a href="" class="logo"><img src="img/logo.gif" width="100" height="100px" alt="" /></a> 
        <ul id="menu">
            <li class="active"><a href="indexLT.php">Lotes publicitarios</a></li>
            <li ><span><span><a href="procesar_renta.php">Rentas Activas</a></span></span></li>
            <li><a href="indexUS.php">Usuarios Registrados en el Sistema</a></li>
            <li><a href="../indexSC.php">Cerrar Sesión</a></li>
        </ul>
    </div>
    <br>
    <br>
    <div class="container">
        <h2>Rentas Activas en el Sistema</h2>

        <?php
        // Mostrar mensaje de éxito si se redirigió después de una operación exitosa
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            echo "<p>Los datos se han guardado correctamente en la tabla rentas.</p>";
        }
        ?>

        <table>
            <tr>
                <th style="width: 10%;">ID de Usuario</th>
                <th style="width: 15%;">Usuario</th>
                <th style="width: 30%;">Nombres Agregados</th> <!-- Ajustado el ancho -->
                <th style="width: 15%;">Fecha de Inicio</th>
                <th style="width: 15%;">Fecha de Fin</th>
                <th style="width: 15%;">Acción</th> <!-- Ajustado el ancho -->
            </tr>

            <?php
            // Incluir el archivo de conexión a la base de datos
            include 'conexion.php';

            // Consulta SQL para seleccionar todos los datos de la tabla rentas
            $sql = "SELECT Id_renta, Id_usuario, Usuario, Nombres_agregados, Fecha_inicio, Fecha_fin FROM rentas";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Mostrar datos de cada fila
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["Id_usuario"] . "</td>";
                    echo "<td>" . $row["Usuario"] . "</td>";
                    echo "<td>" . $row["Nombres_agregados"] . "</td>";
                    echo "<td>" . $row["Fecha_inicio"] . "</td>";
                    echo "<td>" . $row["Fecha_fin"] . "</td>";
                    echo "<td><button class='delete-btn' onclick='eliminarRentas(" . $row["Id_renta"] . ")'>Eliminar</button></td>";


                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay rentas registradas.</td></tr>";
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conn);
            ?>
        </table>
        <a href="indexLT.php"><button id="btn-regresar">Regresar</button></a>

<script>
    window.onscroll = function() { mostrarBotonRegresar() };

    function mostrarBotonRegresar() {
        var btnRegresar = document.getElementById("btn-regresar");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            btnRegresar.style.display = "block";
        } else {
            btnRegresar.style.display = "none";
        }
    }
</script>
  </div>

    <script>
    function eliminarRentas(idRenta) {
        if (confirm("¿Está seguro de que desea eliminar esta renta?")) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Eliminación exitosa, recargar la página para actualizar la tabla
                        window.location.reload();
                    } else {
                        // Manejar errores
                        alert('Error al eliminar renta');
                    }
                }
            };
            xhr.open('GET', 'eliminarRentas.php?id=' + idRenta, true);
            xhr.send();
        }
    }
    
    </script>


</body>
</html>
