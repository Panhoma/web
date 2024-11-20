<?php
// processa_departamento.php

// Inclui o arquivo de conexão
include('conexao.php');

// Verifica se o dado foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta o nome do departamento
    $nome = $_POST['nome'];

    // Verifica se o departamento já existe no banco de dados
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM departamentos WHERE nome = :nome");
    $stmt->bindParam(':nome', $nome);
    $stmt->execute();
    $departamentoExists = $stmt->fetchColumn();

    if ($departamentoExists > 0) {
        // Se o departamento já existe, retorna um erro
        echo json_encode(['success' => false, 'message' => 'Departamento já cadastrado']);
        exit();
    }

    // Insere o novo departamento no banco de dados
    $stmt = $pdo->prepare("INSERT INTO departamentos (nome) VALUES (:nome)");
    $stmt->bindParam(':nome', $nome);

    if ($stmt->execute()) {
        // Se a inserção for bem-sucedida, retorna uma resposta de sucesso
        echo json_encode(['success' => true]);
    } else {
        // Se a inserção falhar, retorna um erro
        echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar departamento']);
    }
}
?>
