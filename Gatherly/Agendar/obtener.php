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

// Obtener el ID de la cita
$id = $_GET['id'] ?? null;
$response = [];

if ($id) {
    // Preparar la consulta SQL para obtener la cita específica
    $sql = "SELECT id, nombre, apellido, tipo_evento, fecha, hora FROM citas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $response = $result->fetch_assoc();
    $stmt->close();
}

// Enviar la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);

// Cerrar la conexión
$conn->close();
?>
