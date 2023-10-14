<?php
include('database.php');
$dbConnection = connectDb();
$query = "SELECT * FROM `tblusuarios` WHERE idx= " . $_GET['userid'] . " LIMIT 1";
$result = mysqli_query($dbConnection, $query) or die('MySQL Error');

$record = mysqli_fetch_assoc($result);
mysqli_close($dbConnection);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--estilos para los iconos -->
    <link rel="stylesheet" href="/assets/iconos.css">
    <!-- aqui se irán añadiendo los estilos creados en cada nuevo módulo -->
    <link href="/assets/moduser.css" rel="stylesheet" type="text/css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Actualizar usuario</title>
</head>
<body>
    <div class="content">
        <h1 class="titlePage">Pagina de Actualizacion de Usuario</h1>
        <div class="main">
            <p class="info">Asegura que los datos sean correctos antes de enviarlos<br>
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
                    <legend>Seleciona tu sexo:</legend>
                    <div id="sex" name="sex">
                        <input id="men" name="sex" type="radio" value="H" <?php echo ($record['sexo'] == "H") ? "checked" : ""; ?>/>
                        <label for="men">Hombre</label>
                        <input id="woman" name="sex" type="radio" value="M" <?php echo ($record['sexo'] == "M") ? "checked" : ""; ?>>
                        <label for="woman">Mujer</label>
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
                <input type="tel" name="phone" class="form-input"  required value="<?php if (isset($record['telefono'])) {
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
                        <input type="radio" id="active" name="status" value="1" <?php echo ($record['activo'] == 1) ? "checked" : ""; ?>>
                        <label for="active">Activo</label>
                        
                    </div>
                    <div>
                        <input type="radio" id="non-active" name="status" value="0" <?php echo ($record['activo'] == 0) ? "checked" : ""; ?>>
                        <label for="non-active">Inactivo</label>
                    </div>
                </fieldset>
                <br>
                <center><input class="form-btn" type="submit" name="submit" value="Modificar Usuario" /><br><br><input class="button-30" type="button" value="Lista de Usuarios" onclick="reDir()" /></center>
            </form>
            <!--Fin Formulario-->
        </div>
    </div>

    <script>
        function reDir() {
            window.location = "/backend/userlist.php";
        }
    </script>
</body>


</html>