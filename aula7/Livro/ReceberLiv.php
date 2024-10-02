<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro</title>
</head>
<body>
    <h1>Cadastro de Livro</h1>
    <form action="SalvarLiv.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br>

        <label for="idioma">Idioma:</label>
        <input type="text" name="idioma" required><br>

        <label for="quantidade_paginas">Quantidade de Páginas:</label>
        <input type="number" name="quantidade_paginas" required><br>

        <label for="editora">Editora:</label>
        <input type="text" name="editora" required><br>

        <label for="data_publicacao">Data da Publicação:</label>
        <input type="date" name="data_publicacao" required><br>

        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" required><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>
