<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
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

<div class="container">
    <h1>Bienvenido a tu cuenta</h1>
    <p>¡Hola, Usuario! Bienvenido al sistema de gestión de rentas del Mexibús.</p>
    <p>El Mexibús es un sistema de transporte público de pasajeros que opera en el Estado de México, ofreciendo rutas eficientes y cómodas para sus usuarios.</p>
    <p>Para generar una nueva renta o gestionar tus rentas activas, por favor comunícate directamente con el administrador del sistema. Estamos aquí para ayudarte.</p>

    <!-- Sección de imágenes con animación -->
    <div class="image-section">
        <img src="im1.jpg" alt="Imagen 1">
        <img src="im2.jpg" alt="Imagen 2">
        <img src="im3.jpg" alt="Imagen 3">
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
