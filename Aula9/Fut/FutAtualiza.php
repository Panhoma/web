<?php
$servidor = 'localhost';
$banco = 'futebol';
$usuario = 'root';
$senha = '';

try {
    // Conexão com o banco de dados
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Atualização do time
    $codigoSQL = "UPDATE `times` SET `nome` = :nome, `pontos` = :pontos WHERE `id` = :id";
    $comando = $conexao->prepare($codigoSQL);
    
    $resultado = $comando->execute([
        'nome' => $_GET['nome'],
        'pontos' => $_GET['pontos'],
        'id' => $_GET['id']
    ]);

    echo $resultado ? "Time atualizado com sucesso!" : "Erro ao atualizar o time.";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
} finally {
    $conexao = null; // Fechar a conexão
}
?>
