<?php
session_start();

if(!isset($_SESSION["username"])){
    header("location: index2.php");
}
?>

<!DOCTYPE html>
<html>
<head>
   title>P�gina protegida por contrase�a</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION["username"]; ?>!</h2>
    <p>Esta es una p�gina protegida por contrase�a.</p>
   a href="logout.php">Cerrar sesi�n</a>
</body>
</html>