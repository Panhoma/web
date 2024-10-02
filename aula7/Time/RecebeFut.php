<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Time</title>
</head>
<body>
    <h1>Cadastro de Time de Futebol</h1>
    <form action="SalvaFut.php" method="POST">
        <label for="nome">Nome do Time:</label>
        <input type="text" name="nome" required><br>
        <label for="pontos">Pontos:</label>
        <input type="number" name="pontos" required><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
