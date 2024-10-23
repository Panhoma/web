<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Alunos</title>
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
        input[type="text"],
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Alunos</h2>
        <form action="Inserir_Alunos.php" method="POST">
            <label for="nome">Nome do Aluno:</label>
            <input type="text" id="nome" name="nome" required><br>
            
            <label for="id_turma">Escolha uma Turma:</label>
            <select name="id_turma" id="id_turma" required>
                <optgroup label="Turmas">
                    <?php
                    include 'conexao.php';
                    $turmas = $pdo->query("SELECT * FROM turmas")->fetchAll();
                    foreach ($turmas as $turma) {
                        echo "<option value='{$turma['id']}'>{$turma['nome']}</option>";
                    }
                    ?>
                </optgroup>
            </select><br>
            <input type="submit" value="Cadastrar Aluno">
        </form>
        <a href="menu.php">Voltar</a>
    </div>
</body>
</html>
