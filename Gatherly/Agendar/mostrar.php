<?php
// Datos de conexión a la base de datos
$host = "sunnylite.com.mx"; // Reemplaza con tu servidor MySQL
$dbname = "sunnylit_pruebasSolecito"; // Reemplaza con el nombre de tu base de datos
$username = "sunnylit_Solecito"; // Reemplaza con tu usuario de la base de datos
$password = "Solecito0811!";

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparar la consulta SQL para obtener los datos
$sql = "SELECT id, nombre, apellido, tipo_evento, fecha, hora FROM citas";
$result = $conn->query($sql);

$citas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $citas[] = $row;
    }
}

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($citas);

// Cerrar la conexión
$conn->close();
?>
