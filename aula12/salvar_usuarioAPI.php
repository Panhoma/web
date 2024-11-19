<?php
session_start();
require 'conexao.php';

// Recebe os dados em formato JSON
$input = json_decode(file_get_contents('php://input'), true);

// Verifica se os dados foram recebidos corretamente
if (!isset($input['nome'], $input['usuario'], $input['senha'], $input['tipo_usuario'])) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Dados incompletos']);
    exit;
}

// Extrai os dados recebidos
$nome = $input['nome'];
$usuario = $input['usuario'];
$senha = password_hash($input['senha'], PASSWORD_DEFAULT); // Criptografando a senha
$tipo_usuario = $input['tipo_usuario']; // 'medico' ou 'enfermeiro'

try {
    if ($tipo_usuario == 'medico') {
        // Verifica se os dados de médico foram enviados
        if (!isset($input['especialidade'], $input['crm'])) {
            echo json_encode(['status' => 'erro', 'mensagem' => 'Dados de médico incompletos']);
            exit;
        }
        $especialidade = $input['especialidade'];
        $crm = $input['crm'];

        // Insere o médico no banco
        $sql = "INSERT INTO medicos (nome, especialidade, crm, usuario, senha) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $especialidade, $crm, $usuario, $senha]);

        echo json_encode(['status' => 'sucesso', 'mensagem' => 'Médico cadastrado com sucesso!']);
    } elseif ($tipo_usuario == 'enfermeiro') {
        // Verifica se os dados de enfermeiro foram enviados
        if (!isset($input['coren'])) {
            echo json_encode(['status' => 'erro', 'mensagem' => 'Dados de enfermeiro incompletos']);
            exit;
        }
        $coren = $input['coren'];

        // Insere o enfermeiro no banco
        $sql = "INSERT INTO enfermeiros (nome, coren, usuario, senha) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $coren, $usuario, $senha]);

        echo json_encode(['status' => 'sucesso', 'mensagem' => 'Enfermeiro cadastrado com sucesso!']);
    } else {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Tipo de usuário inválido']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao cadastrar: ' . $e->getMessage()]);
}
?>
