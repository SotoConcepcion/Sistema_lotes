<!DOCTYPE html>
<html>
<head>
    <title>PubliciMex</title>
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
    margin: 50px;
    margin-bottom: 200px;
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
        <a href="index.html" class="logo"><img src="img/logo.gif" width="100" height="100px" alt="" /></a> 
        <ul id="menu">
            <li class="active"><a href="indexLT.php">Lotes publicitarios</a></li>
            <li ><span><span><a href="procesar_renta.php">Rentas Activas</a></span></span></li>
            <li><a href="indexUS.php">Usuarios Registrados en el Sistema</a></li>
            <li><a href="../indexSC.php">Cerrar Sesión</a></li>
        </ul>
    </div>
    <div id="medio">
        <div id="columna_izquierda"></div>
        <div id="columna_centro">
            <div class="titulo_centro"> 
                <h1>Ingresa los Datos del Nuevo Lote</h1>
            </div>
            <table class="listing form" cellpadding="0" cellspacing="0">
                <tr>
                    <th class="full" colspan="2"></th>
                </tr>
                <form action="insert_lt.php" method="POST">
                    <tr>
                        <td class="first" width="172"><strong>Id</strong></td>
                        <td class="last"><input type="text" class="text" name="ID_LOTE"/></td>
                    </tr>
                    <tr>
                        <td class="first" width="172"><strong>Nombre</strong></td>
                        <td class="last"><input type="text" class="text" name="NOMBRE"/></td>
                    </tr>
                    <tr class="bg">
                        <td class="first"><strong>Estación</strong></td>
                        <td class="last">
                            <select class="text" name="ID_ESTACION">
                                <?php
                                include("conexion.php");
                                $sql="SELECT * FROM estacion";
                                $resul = $conn->query($sql);
                                while ($row = $resul->fetch_assoc()) {
                                    echo '<option value="' . $row["Id_estacion"] . '">' .$row["Nombre"]. " - Linea ".$row["Id_linea"]. '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="first"><strong>Dimension</strong></td>
                        <td class="last">
                            <select class="text" name="ID_DIMENSION">
                                <?php
                                include("conexion.php");
                                $sql="SELECT * FROM dimensiones";
                                $resul = $conn->query($sql);
                                while ($row = $resul->fetch_assoc()) {
                                    echo '<option value="' . $row["Id_dimension"] . '">' .$row["Medidas"]. '</option>';
                                }
                                ?> 
                            </select>
                        </td>
                    </tr>
                    <tr class="bg">
                        <td class="first"><strong>Estado</strong></td>
                        <td class="last">
                            <select class="text" name="ID_STATUS">
                                <?php
                                include("conexion.php");
                                $sql="SELECT * FROM status";
                                $resul = $conn->query($sql);
                                while ($row = $resul->fetch_assoc()) {
                                    echo '<option value="' . $row["Id_status"] . '">' .$row["Estado"]. '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
            </table>
            <br>
            <label><input type="submit" name="Submit" value="Confirmar"/></label>
            </form>
        </div>
        <div id="columna_derecha"></div>
    </div>
    <div id="footer"></div>
</div>
</body>
</html>
