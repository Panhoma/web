<?php
$servidor = 'localhost';
$banco = 'produtos';
$usuario = 'root';
$senha = '';

try {
    // Conexão com o banco de dados
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Atualização do produto
    $codigoSQL = "UPDATE `produto` SET `nome` = :nome, `url` = :url, `descricao` = :descricao, `preco` = :preco WHERE `id` = :id";
    $comando = $conexao->prepare($codigoSQL);
    
    $resultado = $comando->execute([
        'nome' => $_GET['nome'],
        'url' => $_GET['url'],
        'descricao' => $_GET['descricao'],
        'preco' => $_GET['preco'],
        'id' => $_GET['id']
    ]);

    echo $resultado ? "Produto atualizado com sucesso!" : "Erro ao atualizar o produto.";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
} finally {
    $conexao = null; // Fechar a conexão
}
?>
