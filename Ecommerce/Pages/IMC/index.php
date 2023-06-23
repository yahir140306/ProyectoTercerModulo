<?php

require './database.php';

$message = '';

if (
    !empty($_POST['nombre'])
    && !empty($_POST['sexo'])
    && !empty($_POST['peso'])
    && !empty($_POST['estatura'])
    && !empty($_POST['fecha'])
) {
    $nombre = $_POST["nombre"];
    $sexo = $_POST["sexo"];
    $estatura = $_POST["estatura"];
    $peso = $_POST["peso"];
    $fecha = $_POST["fecha"];

    $imc = calcularIMC($estatura, $peso);
    $diagnostico = getDiagnosis($imc, $sexo);

    $sql = "INSERT INTO imc (nombre, sexo, peso, estatura, imc, fecha)
    VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $nombre);
    $stmt->bindValue(2, $sexo);
    $stmt->bindValue(3, $peso);
    $stmt->bindValue(4, $estatura);
    $stmt->bindValue(5, $imc);
    $stmt->bindValue(6, $fecha);


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
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" required>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <label for="sexo">Sexo:</label>
            <select name="sexo" id="sexo" required>
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
            </select>
            <label for="peso">Tu peso:</label>
            <input type="number" name="peso" id="peso" step="0.01" min="0" required>
            <label for="estatura">Tu estatura:</label>
            <input type="number" name="estatura" id="estatura" step="0.01" min="0" required>

            <input type="submit" value="Enviar" class="boton">
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                echo "<p><strong>¿Cómo estás $nombre?, tu sexo es: $sexo, tu IMC es: "  . number_format($imc, 2) . " - $diagnostico " . "</strong></p>";
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
        $consejo = "";
        if ($imc < 17) {
            $condicion = "Desnutrición";
            $consejo = " - Aumenta tu ingesta calórica y consume alimentos ricos en nutrientes como frutas, verduras, proteínas magras y grasas saludables. ";
        } else if ($imc >= 18 && $imc < 20) {
            $condicion = "Bajo Peso";
            $consejo = " - Asegúrate de consumir una dieta equilibrada y nutritiva. Incluye alimentos ricos en proteínas, carbohidratos complejos, grasas saludables y nutrientes esenciales. ";
        } else if ($imc >= 21 && $imc < 25) {
            $condicion = "Normal";
            $consejo = " - Mantén una alimentación equilibrada y variada. Incluye una combinación adecuada de proteínas, carbohidratos, grasas saludables, vitaminas y minerales. ";
        } else if ($imc >= 26 && $imc < 30) {
            $condicion = "Sobrepeso";
            $consejo = " - Reduce el consumo de alimentos procesados, azúcares y grasas saturadas. Aumenta la ingesta de frutas, verduras, fibra y proteínas magras. ";
        } else if ($imc >= 31 && $imc < 35) {
            $condicion = "Obesidad";
            $consejo = " - Sigue una dieta equilibrada y reduce la ingesta de calorías. Opta por alimentos bajos en grasas, azúcares y carbohidratos refinados. ";
        } else if ($imc >= 36 && $imc < 40) {
            $condicion = "Obesidad Marcada";
        } else if ($imc >= 40) {
            $consejo = " - Busca asesoramiento médico o nutricional especializado para abordar estas condiciones específicas.";
            $condicion = "Obesidad Morbida";
        }
        return $condicion . $consejo;
    }

    function ImcMujer($imc)
    {
        $condicion = "";
        $consejo = "";
        if ($imc < 16) {
            $condicion = "Desnutrición";
            $consejo = "";
        } else if ($imc >= 17 && $imc < 20) {
            $condicion = "Bajo Peso";
            $consejo = " - Aumenta tu ingesta calórica y consume alimentos ricos en nutrientes como frutas, verduras, proteínas magras y grasas saludables. ";
        } else if ($imc >= 21 && $imc < 24) {
            $condicion = "Normal";
            $consejo = " - Asegúrate de consumir una dieta equilibrada y nutritiva. Incluye alimentos ricos en proteínas, carbohidratos complejos, grasas saludables y nutrientes esenciales. ";
        } else if ($imc >= 25 && $imc < 29) {
            $condicion = "Sobrepeso";
            $consejo = " - Mantén una alimentación equilibrada y variada. Incluye una combinación adecuada de proteínas, carbohidratos, grasas saludables, vitaminas y minerales. ";
        } else if ($imc >= 30 && $imc < 34) {
            $condicion = "Obesidad";
            $consejo = " - Reduce el consumo de alimentos procesados, azúcares y grasas saturadas. Aumenta la ingesta de frutas, verduras, fibra y proteínas magras. ";
        } else if ($imc >= 35 && $imc < 39) {
            $condicion = "Obesidad Marcada";
            $consejo = " - Sigue una dieta equilibrada y reduce la ingesta de calorías. Opta por alimentos bajos en grasas, azúcares y carbohidratos refinados. ";
        } else if ($imc > 40) {
            $condicion = "Obesidad Morbida";
            $consejo = " - Busca asesoramiento médico o nutricional especializado para abordar estas condiciones específicas.";
        }

        return $condicion . $consejo;
    }
    ?>
</body>

</html>