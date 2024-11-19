<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paciente_nome = $_POST['paciente_nome'];
    $medicamento = $_POST['medicamento'];
    $data_admin = $_POST['data_admin'];
    $hora_admin = $_POST['hora_admin'];
    $dose = $_POST['dose'];

    // Verificar se paciente já existe no banco
    $sql_paciente = "SELECT id FROM pacientes WHERE nome = ?";
    $stmt_paciente = $pdo->prepare($sql_paciente);  // Usando $mysqli para preparar a consulta

    // Vincular o parâmetro para a consulta
    $stmt_paciente->bind_param("s", $paciente_nome); // 's' para string
    $stmt_paciente->execute(); // Executa a consulta

    // Recuperar o resultado
    $result = $stmt_paciente->get_result();
    $paciente = $result->fetch_assoc(); // Sem argumentos no fetch_assoc()

    if ($paciente) {
        // Cadastro de receita médica
        $sql = "INSERT INTO receitas (paciente_id, medicamento, data_admin, hora_admin, dose) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        // Vincular os parâmetros para a inserção
        $stmt->bind_param("issss", $paciente['id'], $medicamento, $data_admin, $hora_admin, $dose);
        $stmt->execute(); // Executa a inserção

        // Redirecionar após a inserção
        header('Location: menu.php');
        exit; // Certifique-se de sair após o redirecionamento
    } else {
        echo "Paciente não encontrado! Registre o paciente primeiro.";
    }
}
?>
