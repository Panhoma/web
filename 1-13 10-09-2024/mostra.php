<?php
session_start();
require_once 'aluno.php';

if (!isset($_SESSION['aluno'])) {
    echo "Nenhum aluno cadastrado.";
    exit();
}

$aluno = unserialize($_SESSION['aluno']);  // Desserializa o objeto
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dados do Aluno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'menu.php'; menu('mostra.php'); ?>
    <div class="container mt-4">
        <h1>Dados do Aluno</h1>
        <div class="card">
            <div class="card-header">
                Informações do Aluno
            </div>
            <div class="card-body">
                <h5 class="card-title">Nome: <?php echo htmlspecialchars($aluno->getNome()); ?></h5>
                <p class="card-text">Data de Nascimento: <?php echo htmlspecialchars($aluno->getNascimento()); ?></p>
                <p class="card-text">Curso: <?php echo htmlspecialchars($aluno->getCurso()); ?></p>
                <p class="card-text">Altura: <?php echo htmlspecialchars($aluno->getAltura()) . ' cm'; ?></p> <!-- Atualizado -->
            </div>
            <div class="card-footer text-muted">
                <a href="mostra_idade.php" class="btn btn-primary">Mostrar Idade</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
