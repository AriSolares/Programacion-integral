<?php
// Parámetros de conexión a la base de datos
$host = "sunnylite.com.mx"; // Reemplaza con tu servidor MySQL
$dbname = "sunnylit_pruebasSolecito"; // Reemplaza con el nombre de tu base de datos
$username = "sunnylit_Solecito"; // Reemplaza con tu usuario de la base de datos
$password = "Solecito0811!"; // Reemplaza con tu contraseña de la base de datos

// Crear la conexión usando MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar si la conexión ha fallado
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Opcional: Puedes establecer el conjunto de caracteres que usará la base de datos
$conn->set_charset("utf8");

?>