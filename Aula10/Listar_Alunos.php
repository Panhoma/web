<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Alunos</title>
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
        label {
            display: block;
            margin-bottom: 5px;
        }
        select,
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Listar Alunos de uma Turma</h2>
        <form action="Listar_Alunos_result.php" method="GET">
            <label for="id_turma">Selecionar Turma:</label>
            <select id="id_turma" name="id_turma" required>
                <?php
                $turmas = $pdo->query("SELECT * FROM turmas")->fetchAll();
                foreach ($turmas as $turma) {
                    echo "<option value='{$turma['id']}'>{$turma['nome']}</option>";
                }
                ?>
            </select>
            <input type="submit" value="Listar Alunos">
        </form>
        <a href="menu.php">Voltar</a>
    </div>
</body>
</html>
