<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $leito = $_POST['leito'];

    // Inserindo os dados na tabela pacientes
    $sql = "INSERT INTO pacientes (nome, leito) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $leito]);

    // Mensagem de sucesso via SESSION
    $_SESSION['sucesso'] = "Paciente cadastrado com sucesso!";

    // Redirecionando para a página de menu
    header('Location: menu.php');
    exit;
}
?>
