<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo do IMC</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Calculadora de IMC</h1>
    <form method="post" action="">
        <div class="inputBox">
            <label for="peso" class="labelInput">Digite seu Peso (kg):</label>
            <input type="text" name="peso" id="peso" class="inputUser" required>
        </div>
        <div class="inputBox">
            <label for="altura" class="labelInput">Digite sua Altura (m):</label>
            <input type="text" name="altura" id="altura" class="inputUser" required>
        </div>
        <input type="reset" id="reset" name="reset" value="LIMPAR">
        <input type="submit" id="submit" name="submit" value="CALCULAR">
    </form>
</div>
<div class="box">
    <legend><b>RESULTADO</b></legend>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso = isset($_POST["peso"]) ? $_POST["peso"] : 0;
        $altura = isset($_POST["altura"]) ? $_POST["altura"] : 0;

        if ($peso > 0 && $altura > 0) {
            $imc = $peso / ($altura * $altura);
            $imc = number_format($imc, 2);

            if ($imc <= 18.5) {
                echo "Você está em estado de Magreza, procure uma nutricionista. Seu IMC é: $imc";
            } elseif ($imc > 18.5 && $imc <= 24.9) {
                echo "Você está Saudável, continue assim. Seu IMC é: $imc";
            } elseif ($imc > 25.0 && $imc <= 29.9) {
                echo "Você está com Sobrepeso, procure uma nutricionista. Seu IMC é: $imc";
            } elseif ($imc >= 30.0 && $imc < 34.9) {
                echo "Você está com Obesidade Grau I, procure uma nutricionista. Seu IMC é: $imc";
            } elseif ($imc >= 35.0 && $imc <= 39.9) {
                echo "Você está com Obesidade Grau II, procure uma nutricionista. Seu IMC é: $imc";
            } else {
                echo "Você está com Obesidade Grau III (mórbida), procure uma nutricionista. Seu IMC é: $imc";
            }
        } else {
            echo "Por favor, insira valores válidos.";
        }
    }
    ?>
</div>
</body>
</html>

