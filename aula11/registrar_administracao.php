<?php
session_start();
require 'conexao.php'; // Inclui a conexão com o banco de dados

// Verifica se o parâmetro receita_id foi passado na URL
if (!isset($_GET['receita_id'])) {
    echo "Receita não encontrada!";
    exit;
}

$receita_id = $_GET['receita_id'];

// Consulta os detalhes da receita, incluindo o leito (que está na tabela pacientes)
$sql = "SELECT r.id AS receita_id, p.nome AS paciente_nome, r.medicamento, r.data_admin, r.hora_admin, r.dose, p.leito
        FROM receitas r
        INNER JOIN pacientes p ON r.paciente_id = p.id
        WHERE r.id = ?";
$stmt = $pdo->prepare($sql); // Prepara a consulta
$stmt->bind_param('i', $receita_id); // Vincula o parâmetro
$stmt->execute(); // Executa a consulta

// Verifica se a consulta retornou resultados
$result = $stmt->get_result(); // Recupera os dados da consulta
if ($result->num_rows > 0) {
    $receita = $result->fetch_assoc(); // Pega o resultado como um array associativo
} else {
    echo "Receita não encontrada!";
    exit;
}

// Verifica se o formulário foi enviado para atualizar os dados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $medicamento = $_POST['medicamento'];
    $dose = $_POST['dose'];
    $data_admin = $_POST['data_admin'];
    $hora_admin = $_POST['hora_admin'];

    // Atualiza os dados no banco de dados (não inclui 'leito', pois está na tabela 'pacientes')
    $sql_update = "UPDATE receitas 
                   SET medicamento = ?, dose = ?, data_admin = ?, hora_admin = ? 
                   WHERE id = ?";
    $stmt_update = $pdo->prepare($sql_update);
    $stmt_update->bind_param('ssssi', $medicamento, $dose, $data_admin, $hora_admin, $receita_id);

    if ($stmt_update->execute()) {
        // Redireciona para a página de receitas pendentes após a atualização
        header("Location: receitas_pendentes.php");
        exit; // Importante para garantir que o redirecionamento seja imediato
    } else {
        echo "Erro ao atualizar a receita.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Administração</title>
</head>
<body>
    <h1>Registrar Administração de Medicamento</h1>

    <form action="registrar_administracao.php?receita_id=<?= $receita_id ?>" method="POST">
        <p><strong>Paciente:</strong> <?= htmlspecialchars($receita['paciente_nome']) ?></p>

        <label for="medicamento"><strong>Medicamento:</strong></label><br>
        <input type="text" id="medicamento" name="medicamento" value="<?= htmlspecialchars($receita['medicamento']) ?>" required><br>

        <label for="dose"><strong>Dosagem:</strong></label><br>
        <input type="text" id="dose" name="dose" value="<?= htmlspecialchars($receita['dose']) ?>" required><br>

        <label for="leito"><strong>Leito:</strong></label><br>
        <input type="text" id="leito" name="leito" value="<?= htmlspecialchars($receita['leito']) ?>" disabled><br>

        <label for="data_admin"><strong>Data de Administração:</strong></label><br>
        <input type="date" id="data_admin" name="data_admin" value="<?= htmlspecialchars($receita['data_admin']) ?>" required><br>

        <label for="hora_admin"><strong>Hora de Administração:</strong></label><br>
        <input type="time" id="hora_admin" name="hora_admin" value="<?= htmlspecialchars($receita['hora_admin']) ?>" required><br>

        <input type="hidden" name="receita_id" value="<?= $receita['receita_id'] ?>">

        <p><input type="submit" value="Atualizar Administração"></p>
    </form>

    <br>
    <a href="receitas_pendentes.php">Voltar às receitas pendentes</a>
</body>
</html>
