<?php
$termino_busqueda = $_GET['termino_busqueda'];

// Conectar a la base de datos
$conn = mysqli_connect("localhost", "usuario", "clave", "sisgeo_bd");

// Consulta a la base de datos
$sql = "SELECT * FROM productos WHERE nombre LIKE '%" . $termino_busqueda . "%'";
$resultado = mysqli_query($conn, $sql);
?>

<?php
// Mostrar los resultados de la búsqueda
if (mysqli_num_rows($resultado) > 0) {
    while($fila = mysqli_fetch_assoc($resultado)) {
        echo "ID: " . $fila["id"] . " - Campo 1: " . $fila["campo1"] . " - Campo 2: " . $fila["campo2"] . "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

