<?php
session_start();

if(!isset($_SESSION["username"])){
    header("location: index2.php");
}
?>

<!DOCTYPE html>
<html>
<head>
   title>Página protegida por contraseña</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION["username"]; ?>!</h2>
    <p>Esta es una página protegida por contraseña.</p>
   a href="logout.php">Cerrar sesión</a>
</body>
</html>