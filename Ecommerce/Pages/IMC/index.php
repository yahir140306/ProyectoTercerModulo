<?php

require './database.php';

$message = '';

if (
    !empty($_POST['nombre'])
    && !empty($_POST['sexo'])
    && !empty($_POST['peso'])
    && !empty($_POST['estatura'])
) {
    $nombre = $_POST["nombre"];
    $sexo = $_POST["sexo"];
    $estatura = $_POST["estatura"];
    $peso = $_POST["peso"];

    $imc = calcularIMC($estatura, $peso);
    $diagnostico = getDiagnosis($imc, $sexo);

    $sql = "INSERT INTO imc (nombre, sexo, peso, estatura, imc)
    VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $nombre);
    $stmt->bindValue(2, $sexo);
    $stmt->bindValue(3, $peso);
    $stmt->bindValue(4, $estatura);
    $stmt->bindValue(5, $imc);

    if ($stmt->execute()) {
        $message = "Registro insertado correctamente en la base de datos.";
    } else {
        $message = "Error al insertar el registro.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" href="/Ecommerce/IMG/salud.svg" type="image/x-icon">
    <title>Peso | IMC</title>
</head>

<body>
    <header>
        <h1>IMC. - Indice de Masa Corporal</h1>
    </header>
    <main>
        <form action="./index.php" method="post">
            <h2 class="calculoTitulo">Calcular Peso IMC</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <label for="sexo">Sexo:</label>
            <select name="sexo" id="sexo">
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
            </select>
            <label for="peso">Tu peso:</label>
            <input type="number" name="peso" id="peso" step="0.01" min="0">
            <label for="estatura">Tu estatura:</label>
            <input type="number" name="estatura" id="estatura" step="0.01" min="0">

            <input type="submit" value="Enviar" class="boton">
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                echo "<p><strong>¿Cómo estás $nombre?, tu sexo es: $sexo, tu IMC es: " . number_format($imc, 2) . ", $diagnostico</strong></p>";
            }
            ?>
        </form>
    </main>
    <?php

    function calcularIMC($estatura, $peso)
    {
        return $peso / ($estatura * $estatura);
    }

    function getDiagnosis($imc, $sexo)
    {
        $condicion = "";
        switch ($sexo) {
            case "hombre":
                $condicion = ImcHombre($imc);
                break;
            case "mujer":
                $condicion = ImcMujer($imc);
                break;
        }

        return $condicion;
    }

    function ImcHombre($imc)
    {
        $condicion = "";
        if ($imc < 17) {
            $condicion = "Desnutrición";
        } else if ($imc >= 17 && $imc < 19.9) {
            $condicion = "Bajo Peso";
        } else if ($imc >= 20 && $imc < 24.9) {
            $condicion = "Normal";
        } else if ($imc >= 25 && $imc < 29.9) {
            $condicion = "Ligero Sobrepeso";
        } else if ($imc >= 30 && $imc < 34.9) {
            $condicion = "Obesidad Severa";
        } else if ($imc >= 35) {
            $condicion = "Obesidad Mórbida";
        }
        return $condicion;
    }

    function ImcMujer($imc)
    {
        $condicion = "";
        if ($imc < 16) {
            $condicion = "Desnutrición";
        } else if ($imc >= 16 && $imc < 19.9) {
            $condicion = "Bajo Peso";
        } else if ($imc >= 20 && $imc < 23.9) {
            $condicion = "Normal";
        } else if ($imc >= 24 && $imc < 28.9) {
            $condicion = "Ligero Sobrepeso";
        } else if ($imc >= 29 && $imc < 37) {
            $condicion = "Obesidad Severa";
        } else if ($imc >= 37) {
            $condicion = "Obesidad Mórbida";
        }
        return $condicion;
    }
    ?>
</body>

</html>