<?php
include("conexion.php");

$roles = array(
    1 => "Cliente",
    2 => "Vendedor",
    3 => "Admin"
);

if(isset($_POST['submit']) && isset($_POST['filtro'])) {
    $filtro = $_POST['filtro'];
    $sql = "SELECT * FROM usuario WHERE Id_puesto = $filtro";
} elseif(isset($_POST['buscar']) && !empty($_POST['Nombre_usuario'])) {
    $busqueda = $_POST['Nombre_usuario'];
    $sql = "SELECT * FROM usuario WHERE Nombre_usuario LIKE '%$busqueda%'";
} else {
    $sql = "SELECT * FROM usuario";
}

$query = mysqli_query($conn, $sql);
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
      background-color: #bcdcec ;
    }

    #main {
        width: 100%;
        margin: 0 auto;
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
        margin-right: 450px;
    }

    #columna_izquierda,
    #columna_derecha {
        flex: 1;
    }

    #columna_centro {
        flex: 2;
        background-image: url('img/bg-center-column.jpg'); 
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat; 
        border-radius: 30px;
        padding: 30px;
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

<script type="text/javascript">
function confirmarEliminar() {
    return confirm("¿Está seguro de que desea eliminar este usuario?");
}

function eliminarUsuario(idUsuario) {
    if (confirmarEliminar()) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Eliminación exitosa, actualizar la tabla
                    window.location.reload(); // Recargar la página para mostrar los cambios
                } else {
                    // Manejar errores
                    alert('Error al eliminar usuario');
                }
            }
        };
        xhr.open('GET', 'eliminarUS.php?id=' + idUsuario, true);
        xhr.send();
    }
}
</script>

</head>
<body>
<div id="main">
<div id="header"> 
    <a href="" class="logo"><img src="img/logo.gif" width="100" height="100px" alt="" /></a> 
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
        <h1>Usuarios Registrados</h1>
      </div>
      <div class="select-bar">
        <br>
        <form method="POST">
          <label for="Nombre_usuario">Buscar por Nombre de Usuario:</label>
          <input type="text" name="Nombre_usuario" id="Nombre_usuario">
          <input type="submit" name="buscar" value="Buscar">
        </form>
        <br>
        <form method="POST">
          <label for="filtro">Filtrar por tipo de usuario:</label>
          <select name="filtro" id="filtro">
            <option value="1">Cliente</option>
            <option value="2">Vendedor</option>
            <option value="3">Admin</option>
          </select>
          <input type="submit" name="submit" value="Filtrar">
        </form>
        <br>
        <div class="table">
            <table class="listing" cellpadding="0" cellspacing="0">
              <tr>
                <th class="primero">Id</th>
                <th>Nombre de Usuario</th>
                <th>Nombre</th>
                <th>Apellido P</th>
                <th>Apellido M</th>
                <th>Contraseña</th>
                <th>Empresa</th>
                <th></th>
                <th class="last"></th>
              </tr>
              <?php 
            while($row=mysqli_fetch_array($query)){
            ?>
              <tr>
                <td class="primero estilo3"><?php echo $row['Id_usuario']?></td>
                <td><?php echo $row['Nombre_usuario']?></td>
                <td><?php echo $row['Nombre']?></td>
                <td><?php echo $row['Apellido_P']?></td>
                <td><?php echo $row['Apellido_M']?></td>
                <td><?php echo $row['Contrasenia']?></td>
                <td><?php echo $row['Empresa']?></td>
                <td class="last"><a href="#" onclick="eliminarUsuario(<?php echo $row['Id_usuario']?>); return false;"><img src="img/cancel.gif" width="20px"></a></td>
                <td class="last"><a href="actualizarUS.php?id=<?php echo $row['Id_usuario'];?>"><img src="img/edit.gif" width="20px"></a></td>
              </tr>
              <?php
            }
              ?>
            </table>
            <br><br>
            <label><a href="agregarUS.php"><input type="submit" name="Submit" value="Agregar Usuario"/></a></label>
          </div>
      </div>
    </div>


