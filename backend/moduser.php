<?php
include('database.php');
$dbConnection = connectDb();
$query = "SELECT * FROM `tblusuarios` WHERE idx= " . $_GET['userid'] . " LIMIT 1";
$result = mysqli_query($dbConnection, $query) or die('MySQL Error');

$record = mysqli_fetch_assoc($result);
mysqli_close($dbConnection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--estilos para los iconos -->
    <link rel="stylesheet" href="/assets/iconos.css">
    <!-- aqui se irán añadiendo los estilos creados en cada nuevo módulo -->
    <link href="/assets/muestra.css" rel="stylesheet" type="text/css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Inicio</title>
</head>

<body>
    <div class="content">
        <h1>Pagina de Modificacion de Usuarios</h1>
        <div class="main">
            <p>Este Sitio fue hecho para realizar Practicas de la Materia Bases de Datos II.<br>
                De la carrera ISC de la Universidad ICEP Campus Colima.
            </p>
            <!--Formulario-->
            <form action="updateuser.php" method="POST" name="upuser">
                <input type="hidden" name="idx" value="<?php
                                                        if (isset($record['idx'])) {
                                                            echo $record['idx'];
                                                        } ?>"><br>
                <label for="user">Usuario</label><br>
                <input type="text" name="user" class="form-input" required value="<?php
                                                                                    if (isset($record['usuario'])) {
                                                                                        echo $record['usuario'];
                                                                                    } ?>"><br>
                <label for="name">Nombre</label><br>
                <input type="text" name="name" class="form-input" required value="<?php if (isset($record['nombre'])) {
                                                                                        echo $record['nombre'];
                                                                                    } ?>"><br>
                <br>
                <fieldset>
                    <legend>Selecciona tu sexo:</legend>
                    <div>
                        <input type="checkbox" id="woman" name="sex" value="M">
                        <label for="woman">Mujer</label>
                    </div>
                    <div>
                        <input type="checkbox" id="men" name="sex" value="H">
                        <label for="men">Hombre</label>
                    </div>
                </fieldset>
                <br>
                <label for="level">Nivel </label><br>
                <input type="number" name="level" class="form-input" required min="0" max="3" value="<?php if (isset($record['nivel'])) {
                                                                                        echo $record['nivel'];
                                                                                    } ?>"><br>
                <label for="email">Email</label><br>
                <input type="email" name="email" class="form-input" required value="<?php if (isset($record['email'])) {
                                                                                        echo $record['email'];
                                                                                    } ?>"><br>
                <label for="phone">Teléfono</label><br>
                <input type="tel" name="phone" class="form-input" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required value="<?php if (isset($record['telefono'])) {
                                                                                        echo $record['telefono'];
                                                                                    } ?>"><br>
                <label for="brand">Marca</label><br>
                <input type="text" name="brand" class="form-input" required value="<?php if (isset($record['marca'])) {
                                                                                        echo $record['marca'];
                                                                                    } ?>"><br>
                <label for="comp">Compañia</label><br>
                <input type="text" name="comp" class="form-input" required value="<?php if (isset($record['compañia'])) {
                                                                                        echo $record['compañia'];
                                                                                    } ?>"><br>
                <label for="credit">Saldo</label><br>
                <input type="number" name="credit" class="form-input" required min="0" max="1000" value="<?php if (isset($record['saldo'])) {
                                                                                        echo $record['saldo'];
                                                                                    } ?>"><br>
                <br>
                <fieldset>
                    <legend>Estatus del usuario:</legend>
                    <div>
                        <input type="checkbox" id="active" name="status" value="1">
                        <label for="active">Activo</label>
                    </div>
                    <div>
                        <input type="checkbox" id="non-active" name="status" value="0">
                        <label for="non-active">Inactivo</label>
                    </div>
                </fieldset>
                <br>
                <center><input class="form-btn" type="submit" name="submit" value="Modificar Usuario" /><br><input class="form-btn" type="button" value="Lista de Usuarios" onclick="reDir()" /></center>
            </form>
            <!--Fin Formulario-->
        </div>
    </div>

    <script>
        function reDir() {
            window.location = "userlist.php";
        }
    </script>
</body>

</html>