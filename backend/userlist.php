<?php
include('database.php');
$dbConnection = connectDb();
$query = "SELECT * FROM `tblusuarios`";
$record = mysqli_query($dbConnection, $query) or die('MySQL Error');
mysqli_close($dbConnection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered User List</title>
    <link rel="stylesheet" href="/assets/userlist.css">
    <script>
        function reDir() {
            window.location = '/index.php';
        }
    </script>
</head>

<body>
    <div class="content">

        <div class="main">
            <h1 class="titlePage">Registros de Usuarios</h1>
            <p class="descPage">Listado de usuarios registrados en la base de datos para ayuda y soporte a clientes que poseen lineas telefonicas de nuestros socios</p>
            <br>
            <input class="button-30" type="submit" onclick="reDir()" value="Agregar usuario"><br><br><br>
            <?php
            echo '<ol>';
            $i = 0;
            echo '<table border="1">
            <tr id="headerTable"><td>ID</td><td>Nombre de ususario</td><td>Nombre Completo</td><td>Sexo</td><td>Nivel</td><td>Correo Electronico</td><td>Telefono</td><td>Marca de telefono</td><td>Compañia telefonica</td><td>Saldo</td><td>Estatus</td></tr>
            ';
            foreach ($record as $item) {
                $i++;
                echo '<tr>';
                echo '<td>' . $item['idx'] . '</td>';
                echo '<td>' . $item['usuario'] . '</td>';
                echo '<td>' . $item['nombre'] . '</td>';
                echo '<td>' . $item['sexo'] . '</td>';
                echo '<td>' . $item['nivel'] . '</td>';
                echo '<td>' . $item['email'] . '</td>';
                echo '<td>' . $item['telefono'] . '</td>';
                echo '<td>' . $item['marca'] . '</td>';
                echo '<td>' . $item['compañia'] . '</td>';
                echo '<td>' . $item['saldo'] . '</td>';
                echo '<td>' . $item['activo'] . '</td>';
                echo '<td>' . '<a class="updateUser" href="moduser.php?userid=' . $item['idx'] . '"> Actualizar </a>' . '</td>';
                echo '<td>' . '<a class="dropUser" href="dropuser.php?userid=' . $item['idx'] . '"> Eliminar </a>' . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</ol>';
            echo '</div>';
            ?>
        </div>
</body>

</html>