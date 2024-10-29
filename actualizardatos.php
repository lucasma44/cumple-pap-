<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Datos</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Actualizar Datos</h2>

<form action="guardar_datos_actualizados.php" method="post">
  <!-- Seleccionar Curso -->
  <p>Curso:
    <select name="curso_id">
      <?php
        $conexion = mysqli_connect("localhost", "root", "", "escuela") or die("Problemas en la conexión");
        $registros = mysqli_query($conexion, "SELECT idcurso, nombre_curso FROM curso") or die("Problemas en el select: " . mysqli_error($conexion));
        while ($reg = mysqli_fetch_array($registros)) {
          echo "<option value=\"$reg[idcurso]\">$reg[nombre_curso]</option>";
        }
      ?>
    </select>
    <br><br>
    <p>Nuevo Nombre: <input type="text" name="nuevo_nombre_curso" placeholder="Nuevo nombre curso"></p>
  </p>

  <br><br>

  <!-- Seleccionar Profesor -->
  <p>Profesor:
    <select name="profesor_id">
      <?php
        $registros = mysqli_query($conexion, "SELECT idprofesor, nombre_profesor FROM profesor") or die("Problemas en el select: " . mysqli_error($conexion));
        while ($reg = mysqli_fetch_array($registros)) {
          echo "<option value=\"$reg[idprofesor]\">$reg[nombre_profesor]</option>";
        }
      ?>
    </select>
    <br><br>
    <p>Nuevo nombre: <input type="text" name="nuevo_nombre_profesor" placeholder="Nuevo nombre profesor"></p>
  </p>

  <br><br>

  <!-- Seleccionar Tema -->
  <p>Tema:
    <select name="tema_id">
      <?php
        $registros = mysqli_query($conexion, "SELECT idtemas, nombre_temas FROM temas") or die("Problemas en el select: " . mysqli_error($conexion));
        while ($reg = mysqli_fetch_array($registros)) {
          echo "<option value=\"$reg[idtemas]\">$reg[nombre_temas]</option>";
        }
      ?>
    </select>
    <br><br>
    <p>Nuevo Nombre: <input type="text" name="nuevo_nombre_tema" placeholder="Nuevo nombre tema"></p>
  </p>



  <!-- Botón para enviar -->
  <button type="submit" name="accion" value="guardar">Actualizar</button>
</form>

<style>
  h2 {
    margin-left: 570px;
  }
  form{
    max-width:300px;
    margin:auto;
    padding:30px;

  }
  p{
    font-weight:bold;
  }
</style>



</body>
</html>
