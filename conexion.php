<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "escuela"; // Reemplaza 'nombre_de_tu_base_de_datos' con el nombre real de tu base de datos
$conexion = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
