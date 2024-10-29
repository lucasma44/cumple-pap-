<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$conexion = new mysqli("localhost", "root", "", "escuela");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$idprofesor = intval($_GET['idprofesor']);
$query = "SELECT idcurso, nombre_curso FROM curso WHERE profesor_idprofesor = $idprofesor";
$resultado = $conexion->query($query);

echo "<label for='curso'>Selecciona un curso:</label>";
echo "<select id='curso' name='curso' onchange='mostrarTemas(this.value)'>";
echo "<option value=''>Selecciona un curso</option>";
while ($curso = $resultado->fetch_assoc()) {
    echo "<option value='" . $curso['idcurso'] . "'>" . $curso['nombre_curso'] . "</option>";
}
echo "</select>";

$conexion->close();
?>


</body>
</html>