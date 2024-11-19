<?php
session_start();
require 'conexao.php'; // Conexão com o banco de dados

// Define o tipo de resposta da API como JSON
header('Content-Type: application/json');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Usuário não autorizado']);
    exit;
}

// Verifica se o parâmetro receita_id foi passado via POST
if (!isset($_POST['receita_id'])) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Receita não encontrada!']);
    exit;
}

$receita_id = $_POST['receita_id'];

// Consulta os detalhes da receita
$sql = "SELECT r.id AS receita_id, p.nome AS paciente_nome, r.medicamento, r.data_admin, r.hora_admin, r.dose, p.leito
        FROM receitas r
        INNER JOIN pacientes p ON r.paciente_id = p.id
        WHERE r.id = ?";
$stmt = $pdo->prepare($sql);
$stmt->bind_param('i', $receita_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $receita = $result->fetch_assoc();
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Receita não encontrada!']);
    exit;
}

// Verifica se os dados foram passados via POST para atualizar
if (isset($_POST['medicamento'], $_POST['dose'], $_POST['data_admin'], $_POST['hora_admin'])) {
    // Recebe os dados do POST
    $medicamento = $_POST['medicamento'];
    $dose = $_POST['dose'];
    $data_admin = $_POST['data_admin'];
    $hora_admin = $_POST['hora_admin'];

    // Atualiza a receita no banco de dados
    $sql_update = "UPDATE receitas 
                   SET medicamento = ?, dose = ?, data_admin = ?, hora_admin = ? 
                   WHERE id = ?";
    $stmt_update = $pdo->prepare($sql_update);
    $stmt_update->bind_param('ssssi', $medicamento, $dose, $data_admin, $hora_admin, $receita_id);

    if ($stmt_update->execute()) {
        // Responde com sucesso em formato JSON
        echo json_encode([
            'status' => 'sucesso',
            'mensagem' => 'Administração registrada com sucesso!',
            'dados' => [
                'receita_id' => $receita_id,
                'medicamento' => $medicamento,
                'dose' => $dose,
                'data_admin' => $data_admin,
                'hora_admin' => $hora_admin
            ]
        ]);
    } else {
        // Caso haja erro na atualização
        echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao registrar administração']);
    }
    exit;
}

// Caso a requisição não contenha dados POST para atualizar, apenas retorna os dados da receita
