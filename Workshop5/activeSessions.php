<?php
require 'utils/functions.php';

// Verifica si se pasó un parámetro
if ($argc < 2) {
    echo "Por favor, proporciona el número de horas como argumento.\n";
    exit(1);
}

$hoursThreshold = (int)$argv[1];
$timeThreshold = date('Y-m-d H:i:s', strtotime("-$hoursThreshold hours"));

$conn = getConnection();
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Buscar usuarios activos cuya última fecha de inicio de sesión sea mayor que el umbral
$sql = "SELECT id FROM users WHERE status = 'active' AND last_login_datetime < ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $timeThreshold);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Marcar como 'inactive'
        $userId = $row['id'];
        $updateSql = "UPDATE users SET status = 'inactive' WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("i", $userId);
        $updateStmt->execute();

        echo "Usuario ID {$userId} marcado como 'inactive'.\n";
    }
} else {
    echo "No hay usuarios activos que necesiten ser marcados como 'inactive'.\n";
}

$stmt->close();
$conn->close();
?>
