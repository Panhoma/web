<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Listar Alunos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Alunos da Turma</h2>
        <?php
        $id_turma = $_GET['id_turma'];

        $alunos = $pdo->prepare("SELECT * FROM alunos WHERE id_turma = :id_turma");
        $alunos->execute(['id_turma' => $id_turma]);
        $alunos = $alunos->fetchAll();

        if (count($alunos) > 0) {
            echo "<table><tr><th>ID</th><th>Nome</th><th>Ação</th></tr>";
            foreach ($alunos as $aluno) {
                echo "<tr><td>{$aluno['id']}</td><td>{$aluno['nome']}</td>";
                echo "<td><a href='Listar_Notas_result.php?id_aluno={$aluno['id']}'>Ver Notas</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhum aluno encontrado para esta turma.</p>";
        }
        ?>
        <a href="Listar_Alunos.php">Voltar</a>
    </div>
</body>
</html>
