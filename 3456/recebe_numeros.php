<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
$pg_atual = 'resultado';
include 'navbar.php';
?>
    <div class='container-fluid'>
        <h1>Resultado:</h1>
<?php

$n1 = isset($_GET['num1']) ? (float)$_GET['num1'] : 0;
$n2 = isset($_GET['num2']) ? (float)$_GET['num2'] : 0;
$n3 = isset($_GET['num3']) ? (float)$_GET['num3'] : 0;
$operacao = isset($_GET['operacao']) ? $_GET['operacao'] : 'soma';
$vetor = array($n1, $n2, $n3);

function calcular($n1, $n2, $n3, $op, $vetor)
{
    switch ($op) {
        case 'soma':
            return $n1 + $n2;
        case 'sub':
            return $n1 - $n2;
        case 'multiplicacao':
            return $vetor[0] * $vetor[1] * $vetor[2];
        case 'divisao':
            if ($n2 != 0) {
            return $n1 = $n1/$n2;
            } else {
            return $n1 = 'Divisão por zero não é permitida';
            }
        default:
            return 'Operação inválida';
    }
}

$resultado = calcular($n1, $n2, $n3, $operacao,$vetor);
echo "$n1 ";
if ($operacao == 'soma') {
    echo "+";
} else if ($operacao == 'sub') {
    echo "-";
} else if ($operacao == 'multiplicacao') {
    echo "*";
} else if ($operacao == 'divisao') {
    echo "/";
}      
        
echo " $n2";
if ($operacao == 'multiplicacao') {
    echo " * $n3";
}
echo " = $resultado";
?>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
