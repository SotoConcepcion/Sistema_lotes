<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_lots'])) {
    echo "<p>Lotes seleccionados:</p>";
    echo "<ul>";
    foreach ($_POST['selected_lots'] as $selected_lot) {
        echo "<li>$selected_lot</li>";
    }
    echo "</ul>";

    // Establecer la conexión con la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Proyecto";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener los IDs de los lotes seleccionados
    $selected_lots = $_POST['selected_lots'];

    // Consulta SQL para obtener los detalles de los lotes seleccionados
    $sql = "SELECT lote.Id_lote, lote.Nombre AS Nombre_lote, estacion.Nombre AS Nombre_estacion, dimensiones.Medidas, dimensiones.Precio
            FROM lote
            INNER JOIN estacion ON lote.Id_estacion = estacion.Id_estacion
            INNER JOIN dimensiones ON lote.Id_dimension = dimensiones.Id_dimension
            WHERE lote.Id_lote IN (" . implode(',', $selected_lots) . ")";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los detalles de los lotes seleccionados
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row["Nombre_lote"] . '</h5>';
            echo '<p class="card-text">Estación: ' . $row["Nombre_estacion"] . '</p>';
            echo '<p class="card-text">Medidas: ' . $row["Medidas"] . '</p>';
            echo '<p class="card-text">Precio: $' . $row["Precio"] . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No se encontraron lotes seleccionados.";
    }
}
?>
