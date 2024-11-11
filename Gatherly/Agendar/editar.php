<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Obtener los datos enviados por JSON
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$nombre = $data['nombre'];
$apellido = $data['apellido'];
$tipo_evento = $data['tipo_evento'];
$fecha = $data['fecha'];
$hora = $data['hora'];

// Verificar si ya existe una cita en la misma fecha y hora, excepto la actual
$check_sql = "SELECT * FROM citas WHERE fecha = ? AND hora = ? AND id != ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ssi", $fecha, $hora, $id);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    // Si ya hay una cita en el mismo horario, devuelve un mensaje de error
    echo json_encode(['success' => false, 'message' => "Ya existe una cita en este horario. Por favor, elige otro horario."]);
} else {
    // Si no hay conflicto, actualiza la cita en la base de datos
    $sql = "UPDATE citas SET nombre = ?, apellido = ?, tipo_evento = ?, fecha = ?, hora = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => "Error en la preparación de la consulta: " . $conn->error]);
        exit;
    }

    $stmt->bind_param("sssssi", $nombre, $apellido, $tipo_evento, $fecha, $hora, $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => "Cita actualizada con éxito."]);
    } else {
        echo json_encode(['success' => false, 'message' => "esta fecha y hora ya esta apartada: " . $stmt->error]);
    }

    $stmt->close();
}

$check_stmt->close();
$conn->close();
?>
