<?php
session_start();
require 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

// Verifica se os parâmetros necessários foram passados
if (isset($_POST['receita_id']) && isset($_POST['data_hora'])) {
    $receita_id = $_POST['receita_id'];
    $data_registro = $_POST['data_hora'];

    // Insere a administração na tabela administracoes
    $sql = "INSERT INTO administracoes (receita_id, data_registro) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bind_param('is', $receita_id, $data_registro); // 'i' para integer e 's' para string (data e hora)

    if ($stmt->execute()) {
        // Redireciona para a lista de receitas pendentes com uma mensagem de sucesso
        header('Location: receitas_pendentes.php?success=1');
    } else {
        // Redireciona com uma mensagem de erro
        header('Location: receitas_pendentes.php?error=1');
    }
} else {
    // Se os parâmetros não forem encontrados, redireciona com erro
    header('Location: receitas_pendentes.php?error=1');
}
