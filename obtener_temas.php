<?php
$conexion = new mysqli("localhost", "root", "", "escuela");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$idcurso = intval($_GET['idcurso']);
$query = "SELECT nombre_temas FROM temas WHERE curso_idcurso = $idcurso";
$resultado = $conexion->query($query);

echo "<h3>Temas del curso:</h3>";
echo "<ul>";
while ($tema = $resultado->fetch_assoc()) {
    echo "<li>" . $tema['nombre_temas'] . "</li>";
}
echo "</ul>";

$conexion->close();
?>
