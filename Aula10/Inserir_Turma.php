<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];

    if (empty($nome)) {
        echo "Nome da turma é obrigatório!";
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO turmas (nome) VALUES (:nome)");
    $stmt->execute(['nome' => $nome]);
    echo "Turma cadastrada com sucesso!";
}
?>
<br>
<a href="Cadastro_Turma.php">Voltar para cadastrar mais alunos</a><br>
<a href="menu.php">Voltar ao menu principal</a>
