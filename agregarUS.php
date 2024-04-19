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

  <script type="text/javascript">
  function validarFormulario() {
      var idUsuario = document.forms["registroForm"]["ID_USUARIO"].value;
      var nombre = document.forms["registroForm"]["NOMBRE"].value;
      var apellidoPaterno = document.forms["registroForm"]["APELLIDO_P"].value;
      var apellidoMaterno = document.forms["registroForm"]["APELLIDO_M"].value;
      var nombreUsuario = document.forms["registroForm"]["NOMBRE_USUARIO"].value;
      var telefono = document.forms["registroForm"]["TELEFONO"].value;
      var correo = document.forms["registroForm"]["CORREO"].value;
      var contrasenia = document.forms["registroForm"]["CONTRASENIA"].value;
      var empresa = document.forms["registroForm"]["EMPRESA"].value;
      
      if (idUsuario == "" || nombre == "" || apellidoPaterno == "" || apellidoMaterno == "" || nombreUsuario == "" || telefono == "" || correo == "" || contrasenia == "" || empresa == "") {
          alert("Por favor, complete todos los campos.");
          return false;
      }
      return true;
  }
  </script>

  </head>
  <body>
  <div id="main">
    <div id="header"> 
      <a href="" class="logo"><img src="img/logo.gif" width="100" height="100px" alt="" /></a> 
      <ul id="menu">
        <li ><span><span><a href="indexLT.php">Lotes publicitarios</a></span></span></li>
        <li ><span><span><a href="indexRT.html">Rentas Activas</a></span></span></li>
        <li class="active"><span><span><a href="indexUS.php">Usuarios Registrados en el Sistema</a></span></span></li>
        <li><span><span><a href="../indexSC.php">Cerrar Sesión</a></span></span></li>
      </ul>
    </div>
    <div id="medio">
      <div id="columna_izquierda">

      </div>
      <div id="columna_centro">
          <div class="titulo_centro"> 
            <h1>Ingresa los Datos de la Nueva Cuenta</h1>
          </div>
          <br><br><br>
          <table class="listing form" cellpadding="0" cellspacing="0">
          <form name="registroForm" action="insert_us.php" method="POST" onsubmit="return validarFormulario()">

            <tr>
              <td class="first"><strong>Nombre</strong></td>
              <td class="last"><input type="text" class="text" name="NOMBRE"/></td>
            </tr>
            <tr class="bg">
              <td class="first"><strong>Apellido Paterno</strong></td>
              <td class="last"><input type="text" class="text" name="APELLIDO_P"/></td>
            </tr>
            <tr>
              <td class="first"><strong>Apellido Materno</strong></td>
              <td class="last"><input type="text" class="text" name="APELLIDO_M"/></td>
            </tr>
            <tr class="bg">
              <td class="first"><strong>Nombre de Usuario</strong></td>
              <td class="last"><input type="text" class="text" name="NOMBRE_USUARIO"/></td>
            </tr>
            <tr>
              <td class="first"><strong>Telefono</strong></td>
              <td class="last"><input type="text" class="text" name="TELEFONO"/></td>
            </tr>
            <tr class="bg">
              <td class="first"><strong>Correo</strong></td>
              <td class="last"><input type="text" class="text" name="CORREO"/></td>
            </tr>
            <tr>
              <td class="first"><strong>Contraseña</strong></td>
              <td class="last"><input type="text" class="text" name="CONTRASENIA"/></td>
            </tr>
            <tr class="bg">
              <td class="first"><strong>Empresa</strong></td>
              <td class="last"><input type="text" class="text" name="EMPRESA"/></td>
            </tr>
            <tr>
              <td class="first"><strong>Tipo de Usuario</strong></td>
              <td class="last"><select class="text" name="ID_PUESTO">
                          <?php
                          include("conexion.php");
                          $sql="SELECT Id_puesto, Puesto FROM puesto";
                          $resul = $conn->query($sql);
                          while ($row = $resul->fetch_assoc()) {
                            echo '<option value="' . $row["Id_puesto"] . '">' .$row["Puesto"]. " ". '</option>';
                          }
                          ?>
                          
                        </select>
                    </td>
            </tr>
          </table>
          <br>
            <input type="submit" name="Submit" value="Confirmar"/>
          </form>
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
