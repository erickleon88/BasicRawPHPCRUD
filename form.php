<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <div class="content">
        <h1>Simple Admin With Sessions</h1>
        <div class="main">
            <form action="backend/login.php" method="post" name="admform">
                <label for="user">Usuario</label><br>
                <input type="text" name="user" placecholder="Usuario" required><br>
                <label for="pwd">Password</label><br>
                <input type="password" name="pwd" placecholder="Contraseña" required><br><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
    <footer></footer>
</body>
</html>