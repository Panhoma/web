<?php
$servidor = 'localhost';
$banco = 'livros';
$usuario = 'root';
$senha = '';

try {
    // Conexão com o banco de dados
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Atualização do livro
    $codigoSQL = "UPDATE `livro` SET `titulo` = :titulo, `idioma` = :idioma, `qtdPaginas` = :qtdPaginas, `editora` = :editora, `dataPublicacao` = :dataPublicacao, `ISBN` = :ISBN WHERE `id` = :id";
    $comando = $conexao->prepare($codigoSQL);
    
    $resultado = $comando->execute([
        'titulo' => $_GET['titulo'],
        'idioma' => $_GET['idioma'],
        'qtdPaginas' => $_GET['qtdPaginas'],
        'editora' => $_GET['editora'],
        'dataPublicacao' => $_GET['dataPublicacao'],
        'ISBN' => $_GET['ISBN'],
        'id' => $_GET['id']
    ]);

    echo $resultado ? "Livro atualizado com sucesso!" : "Erro ao atualizar o livro.";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
} finally {
    $conexao = null; // Fechar a conexão
}
?>
