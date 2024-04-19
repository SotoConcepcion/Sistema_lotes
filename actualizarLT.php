<?php
include("conexion.php");

// Verificar si se envió el formulario y procesar la actualización
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id_lote = $_GET['id'];
    $nombre = $_POST['NOMBRE'];
    $id_estacion = $_POST['ID_ESTACION'];
    $id_dimension = $_POST['ID_DIMENSION'];
    $id_status = $_POST['ID_STATUS'];

    // Consulta SQL para actualizar el lote
    $sql_update = "UPDATE lote SET Nombre_lote='$nombre', Id_estacion='$id_estacion', Id_dimension='$id_dimension', Id_status='$id_status' WHERE Id_lote=$id_lote";
    if (mysqli_query($conn, $sql_update)) {
        echo "Lote actualizado correctamente.";
    } else {
        echo "Error al actualizar el lote: " . mysqli_error($conn);
    }
}

// Consulta para obtener los datos del lote si el ID está definido
if (isset($_GET['id'])) {
    $id_lote = $_GET['id'];
    $sql = "SELECT * FROM lote WHERE Id_lote=$id_lote";
    $query = mysqli_query($conn, $sql);
    $item = mysqli_fetch_array($query);
} else {
    // Si no se proporciona un ID, redirigir a alguna página de error o manejar de otra manera
    // Aquí estoy simplemente mostrando un mensaje de error
    echo "No se proporcionó un ID de lote.";
    exit(); // Salir del script
}
?>

<!DOCTYPE html>
<html>
<head>
<title>PubliciMex</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<style media="all" type="text/css">
        body {
          margin: 0px;
          padding: 0px;
          font-family: Arial, sans-serif;
          background-color: #f4f4f4;
        }

        #main {
            width: 100%;
            margin: 0 auto;
        }

        #header {
            background-color: #4CAF50;
            padding: 20px;
            text-align: center;
        }

        #header .logo {
            display: inline-block;
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

        #medio {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 20px;
            margin-right: 300PX;
        }

        #columna_izquierda,
        #columna_derecha {
            flex: 1;
        }

        #columna_centro {
            flex: 2;
        }

        .titulo_centro {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .bg {
            background-color: #f2f2f2;
        }

        .text {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div id="main">
<div id="header"> 
    <a href="index.html" class="logo"><img src="img/logo.gif" width="100" height="100px" alt="" /></a> 
    <ul id="menu">
      <li ><span><span><a href="indexLT.php">Lotes publicitarios</a></span></span></li>
      <li ><span><span><a href="procesar_renta.php">Rentas Activas</a></span></span></li>
      <li class="active"><span><span><a href="indexUS.php">Usuarios Registrados en el Sistema</a></span></span></li>
      <li><span><span><a href="../indexSC.php">Cerrar Sesión</a></span></span></li>
    </ul>
  </div>
  <div id="medio">
    <div id="columna_izquierda">
    </div>
    <div id="columna_centro">
      <div class="titulo_centro"> 
        <h1>Datos del Lote que Deseas Actualizar</h1>
      </div>
      <br><br>
      <form action="actualizarLT.php?id=<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" method="POST">
        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">ID</th>
          </tr>
          <tr>
            <td class="fisrt" width="172"><strong>Nombre</strong></td>
            <td class="last"><input type="text" class="text" name="NOMBRE" value="<?php echo isset($item['Nombre_lote']) ? $item['Nombre_lote'] : ''; ?>"></td>
          </tr>
          <tr>
            <td class="fisrt" width="172"><strong>Estación</strong></td>
            <td class="last">
              <select class="text" name="ID_ESTACION">
                <?php
                $sql = "SELECT * FROM estacion";
                $resul = $conn->query($sql);
                while ($row = $resul->fetch_assoc()) {
                    $selected = ($row["Id_estacion"] == $item['Id_estacion']) ? 'selected' : '';
                    echo '<option value="' . $row["Id_estacion"] . '" ' . $selected . '>' . $row["Nombre"] . '</option>';
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Dimensiones</strong></td>
            <td class="last">
              <select class="text" name="ID_DIMENSION">
                <?php
                $sql = "SELECT * FROM dimensiones";
                $resul = $conn->query($sql);
                while ($row = $resul->fetch_assoc()) {
                    $selected = ($row["Id_dimension"] == $item['Id_dimension']) ? 'selected' : '';
                    echo '<option value="' . $row["Id_dimension"] . '" ' . $selected . '>' . $row["Medidas"] . '</option>';
                }
                ?>
              </select>
            </td>
          </tr>
          <tr class="bg">
            <td class="first"><strong>Status</strong></td>
            <td class="last">
              <select class="text" name="ID_STATUS">
                <?php
                $sql = "SELECT * FROM status";
                $resul = $conn->query($sql);
                while ($row = $resul->fetch_assoc()) {
                    $selected = ($row["Id_status"] == $item['Id_status']) ? 'selected' : '';
                    echo '<option value="' . $row["Id_status"] . '" ' . $selected . '>' . $row["Estado"] . '</option>';
                }
                ?>
              </select>
            </td>
          </tr>
        </table>
        <br>
        <input type="submit" name="Submit" value="Confirmar"/>
      </form>
    </div>
  </div>
  <div id="columna_derecha">
  </div>
</div>
<div id="footer">
</div>
</div>
</body>
</html>
