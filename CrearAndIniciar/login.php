<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: http://localhost/ProyectoTercerModulo/Ecommerce/');
}

require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: http://localhost/ProyectoTercerModulo/CrearAndIniciar/');
    } else {
        $message = 'Sorry, Those credentials do not match';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Diseño/Images/saludIcon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./Diseño/index.css">
    <title>Iniciar Sesion</title>
</head>

<body>
    <?php require 'Parciales/header.php' ?>
    <h1>Iniciar Sesion</h1>
    <img src="./Diseño/Images/salud.svg" alt="logo">
    <br>
    <span>or <a href="./singup.php">Registrarte</a></span>
    <?php if (!empty($message)): ?>
    <p>
        <?= $message ?>
    </p>
    <?php endif; ?>
    <main class="menu2">
        <form action="login.php" method="POST">
            <input type="text" name="email" placeholder="Correo Electronico">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" value="Iniciar">
        </form>
    </main>
</body>

</html>