<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Cursos y Temas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Curso que dicta un Profesor y Temas que incluye un Curso</h1>
    
    <!-- Menú desplegable de profesores -->
    <label for="profesor">Selecciona un profesor:</label>
    <select id="profesor" name="profesor" onchange="mostrarCursos(this.value)">
        <option value="">Selecciona un profesor</option>
        <?php
        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "escuela");
        
        // Verificación de conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }
        
        // Consulta de profesores
        $query = "SELECT idprofesor, nombre_profesor FROM profesor";
        $resultado = $conexion->query($query);
        
        while ($profesor = $resultado->fetch_assoc()) {
            echo "<option value='" . $profesor['idprofesor'] . "'>" . $profesor['nombre_profesor'] . "</option>";
        }
        
        $conexion->close();
        ?>
    </select>
    
    <!-- Contenedor para mostrar los cursos -->
    <div id="cursos"></div>
    
    <!-- Contenedor para mostrar los temas del curso -->
    <div id="temas"></div>
    
    <script>
        // Función para mostrar los cursos de un profesor
        function mostrarCursos(idprofesor) {
            if (idprofesor == "") {
                document.getElementById("cursos").innerHTML = "";
                document.getElementById("temas").innerHTML = "";
                return;
            }
            
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "obtener_cursos.php?idprofesor=" + idprofesor, true);
            xhr.onload = function () {
                if (xhr.status == 200) {
                    document.getElementById("cursos").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        // Función para mostrar los temas de un curso
        function mostrarTemas(idcurso) {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "obtener_temas.php?idcurso=" + idcurso, true);
            xhr.onload = function () {
                if (xhr.status == 200) {
                    document.getElementById("temas").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
    <div class="volver">
    <a href="index.php">⏪</a>
    </div>
    <style>
        h1{
            color:black;
            margin-left:400px;
        
        }
        label{
            color:black;
            margin-left:400px;
            font-weight:bold;
        }
        h3{
            color:black;
            margin-left:400px;
        }
        li{
            color:black;
            margin-left:400px;
        }
         
        
        a{
            top:0;
            left:30px;
            position:fixed;
            
        }
        
    </style>
</body>
</html>
