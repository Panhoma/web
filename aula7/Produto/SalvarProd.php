<?php
// Conexão com o banco de dados
$servidor = 'localhost';
$banco = 'produtos';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nome = $_POST['nome'];
    $url_foto = $_POST['url'];
    $descricao = $_POST['descricao'];
    $preco = str_replace(',', '.',$_POST['preco']);
    
    echo "Recebido: <br>";
    echo "Nome: " . htmlspecialchars($nome) . "<br>";
    echo "URL: " . htmlspecialchars($url_foto) . "<br>";
    echo "Descrição: " . htmlspecialchars($descricao) . "<br>";
    echo "Preço: " . htmlspecialchars($preco) . "<br>";

    $codigoSQL = "INSERT INTO `produto`(`ID`, `Nome`, `Url`, `Descricao`, `preco`) VALUES (null, :nm, :url,:desc,:pre)";
    $comando = $conexao->prepare($codigoSQL);
    $resultado = $comando->execute(array('nm' => $nome,'url' => $url_foto,'desc' => $descricao,'pre' => $preco));

    if ($resultado) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o produto.";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar a conexão
$conexao = null;
?>
