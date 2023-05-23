<?php
include('database.php');
$dbConnection = connectDb();
mysqli_close($dbConnection);