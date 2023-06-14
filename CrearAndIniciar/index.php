<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password From users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear | Iniciar | Cuenta</title>
    <link rel="stylesheet" href="./Diseño/style.css">
</head>

<body>
    <?php require 'Parciales/header.php' ?>

    <?php if (!empty($user)): ?>
        <br>Welcome. <?= $user['email'] ?>
        <br>You area successfully logged in
        <a href="./logout.php">Pagina</a>
    <?php else: ?>
        <h1>Por favor iniciar o crea una cuenta</h1>
        <a href="./login.php">Iniciar</a>or
        <a href="./singup.php">Crear</a>
    <?php endif; ?>
</body>

</html>