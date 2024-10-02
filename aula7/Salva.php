<?php
$servidor = 'localhost';
$banco = 'receitas';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado!<br>";

    $nome = $_GET['nome'];
    
    $quantidade = str_replace(',', '.', $_GET['quantidade']);

    echo "Recebido: <br>";
    echo "Nome: " . htmlspecialchars($nome) . "<br>";
    echo "Quantidade: " . htmlspecialchars($quantidade) . "<br>";

    $codigoSQL = "INSERT INTO `ingredientes` (`ID`, `Nome`, `Quantidade`) VALUES (NULL, :nm, :qtd)";
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $nome, 'qtd' => $quantidade));

    if ($resultado) {
        echo "<br>Comando executado!";
    } else {
        echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

$conexao = null;

?>
