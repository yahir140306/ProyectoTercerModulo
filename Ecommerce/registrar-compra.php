<?php
// Establecer la conexión a la base de datos
$server = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'php_login_database';

$conn = new mysqli($server, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del carrito enviados desde JavaScript
$datosCarrito = json_decode(file_get_contents("php://input"), true);

// Insertar los productos en la base de datos
foreach ($datosCarrito as $producto) {
    $titulo = $conn->real_escape_string($producto['titulo']);
    $cantidad = $conn->real_escape_string($producto['cantidad']);
    $precio = $conn->real_escape_string($producto['precio']);
    $precioPorCantidad = $conn->real_escape_string($producto['precio'] * $producto['cantidad']);

    $sql = "INSERT INTO productoscomprados (titulo, cantidad, precio, precioPorCantidad) 
    VALUES ('$titulo', '$cantidad', '$precio', '$precioPorCantidad')";
    if ($conn->query($sql) !== true) {
        die("Error al insertar los datos: " . $conn->error);
    }
}

// Cerrar la conexión
$conn->close();

// Enviar la respuesta al cliente
echo "success";
