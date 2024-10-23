<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = $_POST['valor'];
    $id_aluno = $_POST['id_aluno'];

    if ($valor < 0 || $valor > 100) {
        echo "Nota deve estar entre 0 e 100!";
        exit;
    }

    $stmt = $pdo->prepare("SELECT id_turma FROM alunos WHERE id = :id_aluno");
    $stmt->execute(['id_aluno' => $id_aluno]);
    $id_turma = $stmt->fetchColumn();

    if (!$id_turma) {
        echo "Erro: Aluno não encontrado.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO notas (valor, id_aluno, id_turma) VALUES (:valor, :id_aluno, :id_turma)");
        $stmt->execute(['valor' => $valor, 'id_aluno' => $id_aluno, 'id_turma' => $id_turma]);
        echo "Nota cadastrada com sucesso!";
    }
}
?>
<br>
<a href="Cadastro_Notas.php">Voltar para cadastrar mais notas</a><br>
<a href="menu.php">Voltar ao menu principal</a>
