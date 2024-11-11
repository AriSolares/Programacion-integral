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

// Obtener el ID de la cita a eliminar
$id = $_GET['id'] ?? null;

$response = ['success' => false];

if ($id) {
    // Preparar la consulta SQL para eliminar la cita
    $sql = "DELETE FROM citas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $response['success'] = true;
    }

    $stmt->close();
}

// Enviar la respuesta en JSON
header('Content-Type: application/json');
echo json_encode($response);

// Cerrar la conexión
$conn->close();
?>
