<?php
$servername = "localhost"; // Cambia esto si tu servidor MySQL está en otro host
$username = "root";        // Tu nombre de usuario MySQL
$password = "";            // Tu contraseña MySQL
$dbname = "VienaLaboratorio"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
