<?php
$servidor = 'localhost';
$banco = 'Produtos';
$usuario = 'root';
$senha = '';

try {
    // Conexão com o banco de dados
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o ID foi passado
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id']; // Cast para inteiro para evitar injeções

        // Prepara a consulta para deletar o livro
        $comandoSQL = 'DELETE FROM produto WHERE ID = :id';
        $comando = $conexao->prepare($comandoSQL);
        $comando->bindParam(':id', $id, PDO::PARAM_INT);
        $comando->execute();

        echo "<p>Produto com ID $id deletado com sucesso.</p>";
    } else {
        echo "<p>ID do produto não fornecido.</p>";
    }
} catch (PDOException $e) {
    echo "<p>Erro ao conectar ao banco de dados: {$e->getMessage()}</p>";
}

// Fechar a conexão
$conexao = null;
?>
<p><a href="ProdMostrar.php">Voltar</a></p> <!-- Link para voltar -->
