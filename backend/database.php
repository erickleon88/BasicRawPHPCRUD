<?php
function connectDb()
{
    $host = "localhost";
    $user = "root";
    $dbName = "pruebas";
    $conection = mysqli_connect($host, $user, "", $dbName) or die('Problemas con el server');

    if (!$conection) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    /* echo "Éxito: Se realizó una conexión apropiada a MySQL! a la base de datos ".$dbName."<br>" . PHP_EOL;
    echo "Información del host: " . mysqli_get_host_info($conection) . PHP_EOL;*/
    return $conection;
}
