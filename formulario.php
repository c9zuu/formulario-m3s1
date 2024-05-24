<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root"; // Cambia esto por tu usuario de MySQL
    $password = ""; // Cambia esto por tu contraseña de MySQL
    $dbname = "proyecto"; // Nombre de tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        // Datos del formulario
        $nombre = $_POST['nombre'];
        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $telefono = $_POST['telefono'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $nacionalidad = $_POST['nacionalidad'];

        // Preparar y vincular
        $stmt = $conn->prepare("INSERT INTO act01 (Nombre, apellido_paterno, apellido_materno, Telefono, Nacimiento, Nacionalidad) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nombre, $apellido_paterno, $apellido_materno, $telefono, $fecha_nacimiento, $nacionalidad);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Nuevo registro creado con éxito";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Cerrar la conexión
        $stmt->close();
    }

    // Cerrar la conexión
    $conn->close();
}
?>
