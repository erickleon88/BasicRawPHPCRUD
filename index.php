<?php
include('backend/database.php');
$dbConnection = connectDb();
$query = "SELECT * FROM `tblusuarios`";
$result = mysqli_query($dbConnection, $query) or die('MySQL Error');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--estilos para los iconos -->
    <link rel="stylesheet" href="assets/iconos.css">
    <!-- aqui se irán añadiendo los estilos creados en cada nuevo módulo -->
    <link href="assets/index.css" rel="stylesheet" type="text/css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Inicio</title>
</head>

<body>
    <div class="content">
        <h1 class="titlePage">Pagina de Registro de Usuarios</h1>
        <div class="main">
            <p class="info">Asegura que los datos sean correctos antes de enviarlos<br>
            </p>
            <!--Formulario-->
            <form action="backend/adduser.php" method="POST" name="reguser">
                <label for="user">Usuario</label><br>
                <input type="text" name="user" class="form-input" required><br>
                <label for="name">Nombre</label><br>
                <input type="text" name="name" class="form-input" required><br>
                <br>
                <fieldset>
                    <legend>Seleciona su sexo:</legend>
                    <div id="sex" name="sex">
                        <input id="men" name="sex" type="radio" value="H" />
                        <label for="men">Hombre</label>
                        <input id="woman" name="sex" type="radio" value="M">
                        <label for="woman">Mujer</label>
                    </div>
                </fieldset>

                <br>
                <label for="level">Nivel </label><br>
                <input type="number" name="level" class="form-input" required min="0" max="3"><br>
                <label for="email">Email</label><br>
                <input type="email" name="email" class="form-input" required><br>
                <label for="phone">Teléfono</label><br>
                <input type="tel" name="phone" class="form-input" required><br>
                <label for="brand">Marca</label><br>
                <input type="text" name="brand" class="form-input" required><br>
                <label for="comp">Compañia</label><br>
                <input type="text" name="comp" class="form-input" required><br>
                <label for="credit">Saldo</label><br>
                <input type="number" name="credit" class="form-input" required min="0" max="1000"><br>
                <br>
                <fieldset>
                    <legend>Estatus del usuario:</legend>
                    <div>
                        <input type="radio" id="active" name="status" value="1">
                        <label for="active">Activo</label>
                    </div>
                    <div>
                        <input type="radio" id="non-active" name="status" value="0">
                        <label for="non-active">Inactivo</label>
                    </div>
                </fieldset>
                <br>
                <center>
                    <input class="form-btn" type="submit" name="submit" value="Registrar Usuario" /><br><br>
                    <input class="button-30" type="button" value="Lista de Usuarios" onclick="reDir()" />
                </center>
            </form>
            <!--Fin Formulario-->
        </div>
    </div>

    <script>
        function reDir() {
            window.location = "backend/userlist.php";
        }
    </script>
</body>

</html>