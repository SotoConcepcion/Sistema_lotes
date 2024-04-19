<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - Sistema de Rentas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        /* Estilos personalizados */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            padding: 20px;
            margin-bottom: 60px; /* Anadido para que el footer no cubra el contenido */
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #007bff;
        }
        p {
            color: #555;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        /* Estilos para el footer */
        footer {
            flex-shrink: 0;

            bottom: 0;
            width: 100%;
            background-color: #007bff; /* Mismo color que el menú */
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        footer p {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a {
            margin: 0 10px;
        }

        footer a img {
            width: 30px; /* Ancho deseado para las imágenes */
            height: 30px; /* Alto deseado para las imágenes */
        }

        footer a:hover {
            text-decoration: underline;
        }
        
        /* Estilos para las imágenes del carrusel */
        .carousel-item img {
            width: 100%; /* Ajusta el ancho al 100% del contenedor */
            height: 400px; /* Altura fija deseada para las imágenes */
            object-fit: cover; /* Ajusta la imagen para que ocupe todo el espacio disponible */
        }

        /* Estilos adicionales para el carrusel */
        #carouselExampleIndicators {
            width: 100%; /* Ancho del carrusel */
            margin: 0 auto; /* Centrar horizontalmente */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema de Rentas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lotesindex.php">Lotes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="registro.php">Registrarse</a>
                    </li>
                   
                   
                        <li class="nav-item">
                            <a class="nav-link" href="rentas_activas.php">Mis Rentas</a>
                        </li>
                   
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Bienvenido al Sistema de Rentas</h1>
        <p>¡Bienvenido! Este es un sistema de rentas donde podrás encontrar información sobre los diferentes lotes disponibles.</p>
        <p>Para acceder a las funcionalidades del sistema, por favor inicia sesión.</p>
        <a href="login.php" class="btn">Iniciar Sesión</a>
        <br>
        <br>
    </div>

    <!-- Carrusel de Imágenes -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="ima1.jpg" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="ima3.png" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="ima2.jpg" class="d-block w-100" alt="Imagen 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <!-- Bootstrap JavaScript y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            </div>
        </div>
        <BR></BR>
        
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Números de contacto: +1234567890, +0987654321</p>
                    <p>Correo electrónico: info@sistemarentas.com</p>
                </div>
                <div class="col-md-6">
                    <a href="#" class="social-icon"><img src="face.ico" alt="Facebook"></a> <!-- Aquí debes poner la ruta de la imagen del icono de Facebook -->
                    <a href="#" class="social-icon"><img src="twi.png" alt="Twitter"></a> <!-- Aquí debes poner la ruta de la imagen del icono de Twitter -->
                    <a href="#" class="social-icon"><img src="insta.png" alt="Instagram"></a> <!-- Aquí debes poner la ruta de la imagen del icono de Instagram -->
                </div>
    </footer>
</body>
</html>
