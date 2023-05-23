<?php
include('database.php');

//Revisamos que no vayan vacios los campos
//Se tuvo que quitar level y status de esta validacion para poder agregar el nivel = 0 y activo = 0
if(!empty($_POST['user'])&&!empty($_POST['name'])&&!empty($_POST['sex'])
&&!empty($_POST['email'])&&!empty($_POST['phone'])&&!empty($_POST['brand'])
&&!empty($_POST['comp'])&&!empty($_POST['credit'])){

    $user = $_POST['user'];
    $name= $_POST['name'];
    $sex = $_POST['sex'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $brand = $_POST['brand'];
    $comp = $_POST['comp'];
    $credit = $_POST['credit'];
    $status = $_POST['status'];  

    //Se abre la coneccion a la db
    $dbConnection = connectDb();
    //Query a la db
    $query = "INSERT INTO `tblusuarios` VALUES (NULL, '$user', '$name', '$sex', '$level', '$email', '$phone', '$brand', '$comp', '$credit', '$status')";
    $success = mysqli_query($dbConnection, $query) or die('Problemas con el server');
    //Revisamos que los datos y la conexion sean correctos y redirigimos
    if($success){
        header('Location: userlist.php');
    }else{
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}
?>