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
    $borrar = $_POST['borrar'];
    
    if (!empty($borrar)) {
        foreach ($borrar as $campo) {
            // Borrar el campo seleccionado
            $sql = "UPDATE act01 SET $campo = NULL";
            if ($conn->query($sql) === TRUE) {
                echo "Campo $campo borrado correctamente.<br>";
            } else {
                echo "Error borrando el campo $campo: " . $conn->error . "<br>";
            }
        }
    } else {
        echo "No se seleccionaron campos para borrar.";
    }
}

$conn->close();
?>
