<?php
session_start();
require 'conexao.php';

// Verifica se o usuário está logado e é um enfermeiro
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

// Consulta as receitas pendentes de administração
$sql = "SELECT r.id AS receita_id, p.nome AS paciente_nome, r.medicamento, r.data_admin, r.hora_admin, p.leito, r.dose
        FROM receitas r
        INNER JOIN pacientes p ON r.paciente_id = p.id
        WHERE NOT EXISTS (
            SELECT 1 FROM administracoes a WHERE a.receita_id = r.id
        )";
$stmt = $pdo->prepare($sql); // Usando $mysqli para preparar a consulta
$stmt->execute(); // Executa a consulta

// Recupera o resultado da consulta
$result = $stmt->get_result(); // Usando get_result() para obter os dados

// Armazena os resultados em um array
$receitas = [];
while ($receita = $result->fetch_assoc()) {
    $receitas[] = $receita; // Adiciona cada linha ao array $receitas
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas Pendentes</title>
    <script>
        function administrarRemedio(receitaId) {
            const dataHoraAtual = new Date();
            const dataHora = dataHoraAtual.toISOString().slice(0, 19).replace("T", " "); // Formato: YYYY-MM-DD HH:MM:SS
            const form = document.createElement("form");
            form.method = "POST";
            form.action = "administrar_remedio.php"; // Página que processará a administração

            // Criação de input escondido para a receita_id e data/hora
            const inputId = document.createElement("input");
            inputId.type = "hidden";
            inputId.name = "receita_id";
            inputId.value = receitaId;

            const inputDataHora = document.createElement("input");
            inputDataHora.type = "hidden";
            inputDataHora.name = "data_hora";
            inputDataHora.value = dataHora;

            form.appendChild(inputId);
            form.appendChild(inputDataHora);

            document.body.appendChild(form);
            form.submit(); // Submete o formulário automaticamente
        }
    </script>
</head>
<body>
    <h1>Receitas Pendentes de Administração</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Medicamento</th>
                <th>Data da Administração</th>
                <th>Hora da Administração</th>
                <th>Leito</th>
                <th>Dose</th>
                <?php if ($_SESSION['tipo'] == 'medico'): ?>
                    <th>Ação</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (count($receitas) > 0): ?>
                <?php foreach ($receitas as $receita): ?>
                    <tr>
                        <td><?= htmlspecialchars($receita['paciente_nome']) ?></td>
                        <td><?= htmlspecialchars($receita['medicamento']) ?></td>
                        <td><?= htmlspecialchars($receita['data_admin']) ?></td>
                        <td><?= htmlspecialchars($receita['hora_admin']) ?></td>
                        <td><?= htmlspecialchars($receita['leito']) ?></td>
                        <td><?= htmlspecialchars($receita['dose']) ?></td>
                        <?php if ($_SESSION['tipo'] == 'medico'): ?>
                            <td>
                                <form action="registrar_administracao.php" method="get">
                                    <input type="hidden" name="receita_id" value="<?= $receita['receita_id'] ?>">
                                    <button type="submit">Registrar Administração</button>
                                </form>
                                <button type="button" onclick="administrarRemedio(<?= $receita['receita_id'] ?>)">Administrar Remédio</button>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Não há receitas pendentes.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <a href="menu.php">Voltar ao Menu</a>
</body>
</html>
