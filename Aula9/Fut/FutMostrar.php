<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando Dados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #0FF;
        }
        th {
            background-color: #FF00FF;
        }
        a {
            color: #d9534;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Mostrando Resultados dos Times</h1>

    <?php
        $servidor = 'localhost';
        $banco = 'futebol';
        $usuario = 'root';
        $senha = '';

        try {
            // Conexão com o banco de dados
            $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $comandoSQL = 'SELECT * FROM times';
            $comando = $conexao->prepare($comandoSQL);
            $comando->execute();

            $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

            if ($resultado) {
                echo "<table>";
                echo "<thead><tr><th>Nome do Time</th><th>Pontos</th><th>Opções</th></tr></thead>";
                echo "<tbody>";

                foreach ($resultado as $linha) {
                    echo "<tr>";
                    echo "<td>{$linha['Nome']}</td>";
                    echo "<td>{$linha['Pontos']}</td>";
                    echo "<td>
                            <a href='FutDelete.php?id=" . htmlspecialchars($linha['ID']) . "'>Apagar</a> |
                            <a href='FutRecebeID.php?id=" . htmlspecialchars($linha['ID']) . "'>Atualizar</a>
                          </td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "<p>Nenhum time encontrado.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Erro ao conectar ao banco de dados: {$e->getMessage()}</p>";
        }

        // Fechar a conexão
        $conexao = null;
    ?>
</body>
</html>
