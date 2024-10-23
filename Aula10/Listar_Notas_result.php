<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Listar Notas</title>
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
        <h2>Notas do Aluno</h2>
        <?php
        $id_aluno = $_GET['id_aluno'];

        $notas = $pdo->prepare("SELECT * FROM notas WHERE id_aluno = :id_aluno");
        $notas->execute(['id_aluno' => $id_aluno]);
        $notas = $notas->fetchAll();

        if (count($notas) > 0) {
            echo "<table><tr><th>Nota</th><th>Turma</th></tr>";
            foreach ($notas as $nota) {
                echo "<tr><td>{$nota['valor']}</td><td>{$nota['id_turma']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhuma nota encontrada.</p>";
        }
        ?>
        <a href="Listar_Alunos.php">Voltar</a>
    </div>
</body>
</html>
