<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'guardar') {
    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "escuela") or die("Problemas en la conexión");

    // Obtener los valores del formulario
    $curso_id = $_POST['curso_id'];
    $nuevo_nombre_curso = $_POST['nuevo_nombre_curso'];
    
    $profesor_id = $_POST['profesor_id'];
    $nuevo_nombre_profesor = $_POST['nuevo_nombre_profesor'];
    
    $tema_id = $_POST['tema_id'];
    $nuevo_nombre_tema = $_POST['nuevo_nombre_tema'];

    // Actualizar el curso si se ingresó un nuevo nombre
    if (!empty($nuevo_nombre_curso)) {
        $actualizar_curso = "UPDATE curso SET nombre_curso = '$nuevo_nombre_curso' WHERE idcurso = $curso_id";
        mysqli_query($conexion, $actualizar_curso) or die("Problemas al actualizar el curso: " . mysqli_error($conexion));
    }

    // Actualizar el profesor si se ingresó un nuevo nombre
    if (!empty($nuevo_nombre_profesor)) {
        $actualizar_profesor = "UPDATE profesor SET nombre_profesor = '$nuevo_nombre_profesor' WHERE idprofesor = $profesor_id";
        mysqli_query($conexion, $actualizar_profesor) or die("Problemas al actualizar el profesor: " . mysqli_error($conexion));
    }

    // Actualizar el tema si se ingresó un nuevo nombre
    if (!empty($nuevo_nombre_tema)) {
        $actualizar_tema = "UPDATE temas SET nombre_temas = '$nuevo_nombre_tema' WHERE idtemas = $tema_id";
        mysqli_query($conexion, $actualizar_tema) or die("Problemas al actualizar el tema: " . mysqli_error($conexion));
    }

    // Cerrar la conexión
    mysqli_close($conexion);

    // Redirigir o mostrar un mensaje de éxito
    echo '<p>Datos actualizados con éxito</p>';
    echo "<p><a href=\"index.php\">Volver a la página principal</a></p>";
}
?>
<style>
p{
color:black;
margin-left:500px;
font-weight:bold;
}
a{
    color:black;
    font-weight:bold;
    text-decoration:none;
}
</style>
</body>
</html>
