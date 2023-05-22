<?
session_start();

if(isset($_SESSION["username"])){
    header("location: index.php");
}

$dbhost = "localhost";
$dbuser = "usuario"; // Usuario de la base de datos
$dbpass = "clave"; // Contraseña de la base de datos
$db = "sisgeo_bd.usuario"; // Nombre de la base de datos

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()){
    die("No se puede conectar a la base de datos: " . mysqli_connect_error());
}

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $query = "SELECT * FROM usuario WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 1){
        $_SESSION["username"] = $username;
        header("location: index.php");
    }
    else{
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php
    if(isset($error)){
        echo "<p>$error</p>";
    }
    ?>
    <form method="post" action="">
        <label>Usuario:</label>
       input type="text" name="username" required><brbr>
       label>Contraseña:</label>
       input type="password" name="password" requiredbrbr>
       input type="submit" name="login" value="Iniciar sesión">
    </form>
</body>
</html>