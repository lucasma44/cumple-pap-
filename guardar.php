<?php
// Conexión a la base de datos
$host = "localhost";
$dbname = "escuela";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre_curso= $_POST['nombre_curso'];
$nombre_profesor = $_POST['nombre_profesor'];
$nombre_temas = $_POST['nombre_temas'];

// Insertar datos en la tabla 'turnos'
$sql1 = "INSERT INTO curso (nombre_curso) 
        VALUES ('$nombre_curso')";

$sql2 = "INSERT INTO profesor (nombre_profesor)
         VALUES ('$nombre_profesor')";

$sql3 = "INSERT INTO temas (nombre_temas)
         VALUES ('$nombre_temas')";

if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
    echo "Nuevo turno guardado exitosamente";
} else {
    echo "Error: " . $conn->error;
}





