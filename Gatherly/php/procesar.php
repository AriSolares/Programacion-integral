<?php
require_once 'conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $contra = htmlspecialchars(trim($_POST['contra']));

    // Encriptar la contraseña antes de almacenarla
    $hashed_password = password_hash($contra, PASSWORD_BCRYPT);

    // Usar una consulta preparada para prevenir inyecciones de SQL
    if ($stmt = $conn->prepare("INSERT INTO usuarios (nombre, contra) VALUES (?, ?)")) {
        
        $stmt->bind_param("ss", $nombre, $hashed_password);

        
        if ($stmt->execute()) {
            echo "<!DOCTYPE html>
                  <html>
                  <head>
                      <script>
                          alert('Registro exitoso.');
                          window.location.href = 'index.html'; // Redirige inmediatamente después del alert
                      </script>
                  </head>
                  <body>
                  </body>
                  </html>";
        } else {
            echo "Error: " . $stmt->error;
        }

        
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    
    $conn->close();
}
?>