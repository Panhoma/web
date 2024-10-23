<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
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
        h1 {
            text-align: center;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            margin: 5px 0;
        }
        nav ul li a {
            text-decoration: none;
            color: #007bff;
            display: block;
            text-align: center;
            padding: 10px;
            border: 1px solid #007bff;
            border-radius: 4px;
        }
        nav ul li a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Notas</h1>
        <nav>
            <ul>
                <li><a href="Cadastro_Turma.php">Cadastrar Turma</a></li>
                <li><a href="Cadastro_Alunos.php">Cadastrar Aluno</a></li>
                <li><a href="Cadastro_Notas.php">Cadastrar Nota</a></li>
                <li><a href="Listar_Alunos.php">Listar Alunos</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
