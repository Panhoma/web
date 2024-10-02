<?php

$servidor = 'localhost';
$banco = 'futebol';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $nome = $_POST['nome'];
    $pontos = (int) $_POST['pontos']; 
    
    
    echo "Recebido: <br>";
    echo "Nome: " . htmlspecialchars($nome) . "<br>";
    echo "Pontos: " . htmlspecialchars($pontos) . "<br>";

    $codigoSQL = "INSERT INTO `times`(`ID`, `Nome`, `Pontos`) VALUES (null,:nm, :pts)";
    $comando = $conexao->prepare($codigoSQL);
    $resultado = $comando->execute(array('nm' => $nome, 'pts' => $pontos));

    if ($resultado) {
        echo "Time cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o time.";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}


$conexao = null;
?>
