<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="novo.php">Novo Produto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mostra.php">Produtos Cadastrados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sair.php">Sair</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <h2>Criar Novo Produto</h2>
    <?php session_start(); ?>
    <form action="cria.php" method="POST">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" required>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" class="form-control" id="valor" name="valor" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="imagemUrl">URL da Imagem</label>
            <input type="text" class="form-control" id="imagemUrl" name="imagemUrl" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Produto</button>
    </form>
</div>
</body>
</html>
