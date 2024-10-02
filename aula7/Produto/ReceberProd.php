<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Time</title>
</head>
<body>
    <h1>Cadastro de Time de Futebol</h1>
    <form action="SalvarProd.php" method="POST">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" required><br>
        <label for="pontos">URL da foto:</label>
        <input type="text" name="url" required><br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required><br>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" required><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
