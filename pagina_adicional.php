<!DOCTYPE html>
<html>
<head>
    <title>Lotes Seleccionados</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styleLT.css">
</head>
<body>
    <h1>Lotes Seleccionados</h1>
    <div class="card-container">
        <?php
        if(isset($_GET['seleccionados']) && is_array($_GET['seleccionados'])) {
            // Obtener los IDs de los lotes seleccionados
            $seleccionados = $_GET['seleccionados'];
            
            // Consultar la base de datos para obtener los detalles de los lotes seleccionados
            $sql = "SELECT lote.Id_lote, lote.Nombre AS Nombre_lote, 
                    lote.Id_estacion, lote.Id_dimension, lote.Id_status, dimensiones.Medidas, dimensiones.Precio, estacion.Nombre AS Nombre_estacion, 
                    status.Estado
                    FROM lote 
                    INNER JOIN estacion ON lote.Id_estacion=estacion.Id_estacion 
                    INNER JOIN dimensiones ON lote.Id_dimension=dimensiones.Id_dimension 
                    INNER JOIN status ON lote.Id_status=status.Id_status
                    WHERE lote.Id_lote IN (" . implode(',', $seleccionados) . ")";
            
            $query = mysqli_query($conn, $sql);
            
            // Mostrar las tarjetas de los lotes seleccionados
            while($row = mysqli_fetch_array($query)) {
                ?>
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">Nombre Lote: <?php echo $row['Nombre_lote'] ?></div>
                        <br>
                        <div class="card-text">Estación: <?php echo $row['Nombre_estacion'] ?></div>
                        <br>
                        <div class="card-text">Dimensiones: <?php echo $row['Medidas'] ?></div>
                        <br>
                        <div class="card-text">Estado: <?php echo $row['Estado'] ?></div>
                        <br>
                        <div class="card-text">Precio: <?php echo $row['Precio'] ?></div>
                        <br>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No se han seleccionado lotes.</p>";
        }
        ?>
    </div>
</body>
</html>
