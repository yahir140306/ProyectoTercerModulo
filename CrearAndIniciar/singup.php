<?php
require 'database.php';

$message = '';

if (
    !empty($_POST['nombre']) && !empty($_POST['sexo']) &&
    !empty($_POST['email']) && !empty($_POST['lugar']) &&
    !empty($_POST['telefono']) && !empty($_POST['password'])
) {
    $sql = "INSERT INTO users (nombre, sexo, email, lugar, telefono, password) VALUES (:nombre, :sexo, :email, :lugar, :telefono, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':sexo', $_POST['sexo']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':lugar', $_POST['lugar']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $message = 'Successfully created new user';
    } else {
        $message = 'Sorry there must have been an issue creating your account';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Diseño/style.css">
    <title>Crear</title>
</head>

<body>
    <?php require 'Parciales/header.php' ?>

    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="./login.php">Login</a> </span>
    <form action="./singup.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre Completo">
        <select name="sexo" id="sexo">
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
        </select>
        <input type="email" name="email" placeholder="Correo Electronico">
        <input type="text" name="lugar" placeholder="Lugar de procendencia">
        <input type="tel" name="telefono" placeholder="Tu numero de telefono">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="password" name="confirm_password" placeholder="Confirmar tu Contraseña">
        <input type="submit" value="Send">
    </form>
</body>

</html>