<?php
session_start();
require 'conexao.php';

// Recebe os dados em formato JSON
$input = json_decode(file_get_contents('php://input'), true);

// Verifica se os dados foram recebidos corretamente
if (!isset($input['nome'], $input['leito'])) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Dados incompletos']);
    exit;
}

// Extrai os dados recebidos
$nome = $input['nome'];
$leito = $input['leito'];

try {
    // Insere o paciente no banco
    $sql = "INSERT INTO pacientes (nome, leito) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $leito]);

    // Retorna sucesso
    echo json_encode(['status' => 'sucesso', 'mensagem' => 'Paciente cadastrado com sucesso!']);
} catch (Exception $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao cadastrar paciente: ' . $e->getMessage()]);
}
?>
