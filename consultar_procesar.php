<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $consultar = $_POST['consultar'];
    
    if (!empty($consultar)) {
        $campos = implode(", ", $consultar);
        $sql = "SELECT $campos FROM act01";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Mostrar resultados
            while ($row = $result->fetch_assoc()) {
                foreach ($consultar as $campo) {
                    echo ucfirst($campo) . ": " . $row[$campo] . "<br>";
                }
                echo "<hr>";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    } else {
        echo "No se seleccionaron campos para consultar.";
    }
}

$conn->close();
?>
