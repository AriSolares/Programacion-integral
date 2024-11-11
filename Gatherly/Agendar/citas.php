<?php
// Activar todos los errores para la depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Datos de conexión a la base de datos
$host = "sunnylite.com.mx";
$dbname = "sunnylit_pruebasSolecito";
$username = "sunnylit_Solecito";
$password = "Solecito0811!";

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'] ?? null;
$apellido = $_POST['apellido'] ?? null;
$tipo_evento = $_POST['tipo_evento'] ?? null;
$fecha = $_POST['fecha'] ?? null;
$hora = $_POST['hora'] ?? null;

// Verificar si los datos se recibieron correctamente
if (!$nombre || !$apellido || !$tipo_evento || !$fecha || !$hora) {
    die("Error: Faltan datos del formulario.");
}

// Verificar si ya existe una cita en la misma fecha y hora
$check_sql = "SELECT COUNT(*) FROM citas WHERE fecha = ? AND hora = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ss", $fecha, $hora);
$check_stmt->execute();
$check_stmt->bind_result($count);
$check_stmt->fetch();
$check_stmt->close();

if ($count > 0) {
    echo "Ya existe una cita en este horario. Por favor, elige otro horario.";
} else {
    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO citas (nombre, apellido, tipo_evento, fecha, hora) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Error en la preparación de la consulta: " . $conn->error;
        exit;
    }

    $stmt->bind_param("sssss", $nombre, $apellido, $tipo_evento, $fecha, $hora);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Cita agendada con éxito.";
    } else {
        echo "Error al agendar la cita: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
}

$conn->close();
?>
