<?php
session_start();
require_once 'aluno.php';

if (!isset($_SESSION['aluno'])) {
    echo "Nenhum aluno cadastrado.";
    exit();
}

$aluno = unserialize($_SESSION['aluno']);  // Desserializa o objeto
$nome = htmlspecialchars($aluno->getNome());
$idade = $aluno->idade();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Idade do Aluno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'menu.php'; menu('mostra_idade.php'); ?>
    <div class="container mt-4">
        <h1>Idade do Aluno</h1>
        <p><?php echo "$nome, $idade anos"; ?></p>
        <a href="mostra.php" class="btn btn-secondary">Voltar</a>
        <a href="sair.php" class="btn btn-danger">Sair</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
