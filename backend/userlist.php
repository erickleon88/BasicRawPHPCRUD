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
    <script>
        function reDir() {
            window.location = 'https://localhost/practicasbd2/backend/index.php';
        }
    </script>
</head>

<body>
    <div class="content">

        <div class="main">
            <h1>Registered Users</h1>
            <p>En esta practica creamos un CRUD sencillo utilizando la base de datos dada en la clase pasada
                como ejemplo y base, ademas del uso de sesiones para poder visualizar esta lista.</p>
            <br>
            <p>Si puedes ver esta pagina con este mensaje significa que te logueaste como administrador
                mediante sesiones</p>
            <?php
            echo '<ol>';
            $i = 0;
            echo '<table border="1">';
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
                echo '<td>' . '<a href="moduser.php?userid=' . $item['idx'] . '"> Update </a>' . '</td>';
                echo '<td>' . '<a href="dropuser.php?userid=' . $item['idx'] . '"> Delete </a>' . '</td>';
                if ($i % 12 == 0) {
                    echo '</tr><tr>';
                }
                echo '</tr>';
            }
            echo '</table>';
            echo '</ol>';
            echo '<input type="submit" onclick="reDir()" value="Inicio"><br><br><br>';
            echo '<a href="logout.php">Cerrar sesión</a>';
            echo '</div>';
            ?>
        </div>
</body>

</html>