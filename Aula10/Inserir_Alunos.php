<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $id_turma = $_POST['id_turma'];

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM alunos WHERE nome = :nome");
    $stmt->execute(['nome' => $nome]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo "Este aluno já está cadastrado. Não é permitido cadastrar o mesmo aluno em outra turma.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO alunos (nome, id_turma) VALUES (:nome, :id_turma)");
        $stmt->execute(['nome' => $nome, 'id_turma' => $id_turma]);
        echo "Aluno cadastrado com sucesso!";
    }
}
?>
<br>
<a href="Cadastro_alunos.php">Voltar para cadastrar mais alunos</a><br>
<a href="menu.php">Voltar ao menu principal</a>
