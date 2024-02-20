<?php
// Conectar a la base de datos (reemplaza los valores con los tuyos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workvibesbueno";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Insertar la emoción en la base de datos
$sql = "INSERT INTO emociones (fecha_registro, emocion) VALUES (CURRENT_DATE(), '')"; 
if ($conn->query($sql) === TRUE) {
    echo "Emoción agregada correctamente";
} else {
    echo "Error al agregar emoción: " . $conn->error;
}

$conn->close();
?>
