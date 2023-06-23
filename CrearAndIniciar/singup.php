<?php
require 'database.php';

$message = '';

if (
    !empty($_POST['nombre']) && !empty($_POST['sexo']) &&
    !empty($_POST['email']) && !empty($_POST['lugar']) &&
    !empty($_POST['telefono']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])
) {
    // Verificar si las contraseñas coinciden
    if ($_POST['password'] !== $_POST['confirm_password']) {
        $message = 'Las contraseñas no coinciden.';
    } else {
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
            $message = 'Nuevo usuario creado con éxito';
        } else {
            $message = 'Lo siento, debe haber habido un problema al crear tu cuenta.';
        }
    }
} else {
    $message = 'Por favor, completa todos los campos.';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Diseño/Images/saludIcon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./Diseño/index.css">
    <title>Registrarte</title>
</head>

<body>
    <?php require 'Parciales/header.php' ?>

    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <div class="inicio">
    <img src="./Diseño/Images/salud.svg" alt="logo">
        <h1>Registrarte.</h1>
    </div>
    <span>or <a href="./login.php">Iniciar Sesion</a> </span>
    <main class="menu2">
        <form action="./singup.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre Completo" required>
            <select name="sexo" id="sexo" required>
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
            </select>
            <input type="email" name="email" placeholder="Correo Electronico" required>
            <input type="text" name="lugar" placeholder="Lugar de procendencia" required>
            <input type="tel" name="telefono" placeholder="Tu numero de telefono" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="password" name="confirm_password" placeholder="Confirmar tu Contraseña" required>
            <input type="submit" value="Registrarte">
        </form>
    </main>
</body>

</html>