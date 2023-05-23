<?php 
include('database.php');

if(!empty($_GET['userid'])){
    //Conexion
    $dbConnection = connectDb();
    //Borramos registro
    $query = "DELETE FROM `tblusuarios` WHERE idx =".$_GET['userid']."";
    $success = mysqli_query($dbConnection, $query);
    //Redirecciones
    if($success){
        header('Location: userlist.php');
    }else{
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}