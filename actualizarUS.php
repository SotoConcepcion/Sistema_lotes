<!DOCTYPE html>
<html>
<head>
<title>Actualizar Usuario - PubliciMex</title>
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
    position: sticky;
    top: 0;
    z-index: 1000;
    width: 100%;
    background-color: #4CAF50;
    padding: 20px;
    text-align: center;
    transition: padding 0.3s;
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
    padding-top: 20px;
    background-color: #bcdcec ;
}

#columna_izquierda,
#columna_derecha {
    flex: 1;
}

#columna_centro {
    flex: 2;
    background-image: url(img/bg-center-column.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 30px;
    padding: 20px;
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
    <a href="" class="logo"><img src="img/logo.gif" width="100" height="100px" alt="" /></a> 
    <ul id="menu">
      <li ><span><span><a href="indexLT.php">Lotes publicitarios</a></span></span></li>
      <li ><span><span><a href="indexRT.php">Rentas Activas</a></span></span></li>
      <li class="active"><span><span><a href="indexUS.php">Usuarios Registrados en el Sistema</a></span></span></li>
      <li><span><span><a href="../indexSC.php">Cerrar Sesión</a></span></span></li>
    </ul>
  </div>
  <div id="medio">
    <div id="columna_izquierda">

    </div>
    <div id="columna_centro">
      <div class="titulo_centro"> 
        <h1>Actualizar Datos de Usuario</h1>
      </div>
      <br><br><br>
      <?php
include("conexion.php");

if(isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM usuario WHERE Id_usuario = $id_usuario");
    $row = mysqli_fetch_array($query);

    if($row) {
        if(isset($_POST['submit'])) {
            $nombre_usuario = $_POST['nombre_usuario'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $contrasenia = $_POST['contrasenia'];
            $empresa = $_POST['empresa'];


            $sql = "UPDATE usuario SET Nombre_usuario = '$nombre_usuario', Nombre = '$nombre', Apellido_P = '$apellido', Contrasenia = '$contrasenia', Empresa = '$empresa' WHERE Id_usuario = $id_usuario";
            
            if(mysqli_query($conn, $sql)) {
                header("Location: http://localhost/comp/administrador/indexUS.php");
            } else {
                echo "Error al actualizar datos: " . mysqli_error($conn);
            }
        }
?>
        <form action="" method="POST">
            <input type="hidden" name="id_usuario" value="<?php echo $row['Id_usuario']; ?>">
            <table class="listing form" cellpadding="0" cellspacing="0">
                <tr class="bg">
                    <td class="first"><strong>Nombre de Usuario</strong></td>
                    <td class="last"><input type="text" name="nombre_usuario" class="text" value="<?php echo $row['Nombre_usuario']; ?>" /></td>
                </tr>
                <tr>
                    <td class="first"><strong>Nombre</strong></td>
                    <td class="last"><input type="text" name="nombre" class="text" value="<?php echo $row['Nombre']; ?>" /></td>
                </tr>
                <tr class="bg">
                    <td class="first"><strong>Apellido Paterno</strong></td>
                    <td class="last"><input type="text" name="apellido" class="text" value="<?php echo $row['Apellido_P']; ?>" /></td>
                </tr>
                <tr>
                    <td class="first"><strong>Apellido Materno</strong></td>
                    <td class="last"><input type="text" name="contrasenia" class="text" value="<?php echo $row['Apellido_M']; ?>" /></td>
                </tr>
                <tr class="bg">
                    <td class="first"><strong>Telefono</strong></td>
                    <td class="last"><input type="text" name="apellido" class="text" value="<?php echo $row['Telefono']; ?>" /></td>
                </tr>
                <tr>
                    <td class="first"><strong>Correo</strong></td>
                    <td class="last"><input type="text" name="contrasenia" class="text" value="<?php echo $row['Correo']; ?>" /></td>
                </tr>
                <tr>
                    <td class="first"><strong>Contraseña</strong></td>
                    <td class="last"><input type="text" name="contrasenia" class="text" value="<?php echo $row['Contrasenia']; ?>" /></td>
                </tr>
                <tr class="bg">
                    <td class="first"><strong>Empresa</strong></td>
                    <td class="last"><input type="text" name="empresa" class="text" value="<?php echo $row['Empresa']; ?>" /></td>
                </tr>

            </table>
            <br>
            <input type="submit" name="submit" value="Actualizar">
        </form>
<?php
    } else {
        echo "No se encontraron datos para el usuario con ID $id_usuario.";

    }
} else {
    echo "No se proporcionó un ID de usuario.";

}
?>

      <br><br>
      <form action="indexUS.php" method="GET">
        <input type="submit" name="Submit" value="Regresar"/>
      </form>
    </div>
    <div id="columna_derecha">

    </div>
  </div>
  <div id="footer">

  </div>
</div>
</body>
</html>
