<?php
$servidor = 'localhost';
$banco = 'futebol';
$usuario = 'root';
$senha = '';

try {
    // Conexão com o banco de dados
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o ID foi passado
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id']; // Cast para inteiro para evitar injeções

        // Prepara a consulta para deletar o time
        $comandoSQL = 'DELETE FROM times WHERE ID = :id';
        $comando = $conexao->prepare($comandoSQL);
        $comando->bindParam(':id', $id, PDO::PARAM_INT);
        $comando->execute();

        echo "<p>Time com ID $id deletado com sucesso.</p>";
    } else {
        echo "<p>ID do time não fornecido.</p>";
    }
} catch (PDOException $e) {
    echo "<p>Erro ao conectar ao banco de dados: {$e->getMessage()}</p>";
}

// Fechar a conexão
$conexao = null;
?>
<p><a href="FutMostrar.php">Voltar</a></p> <!-- Link para voltar -->
