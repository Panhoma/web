<!DOCTYPE html>
<html>
<head>
    <title>Primeira Página</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
session_start();
?>
<nav class="navbar navbar-expand-sm bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Matemática</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if (isset($_SESSION['nome'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="mostrar.php">Mostrar Nome</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="encerrar.php">Encerrar Sessão</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link active" href="primeira.php">Primeira Página</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class='container-fluid'>
    <h1>Primeira Página</h1>
    <?php if (!isset($_SESSION['nome'])): ?>
        <form action="salvar.php" method="post">
            <label for="nome" class="form-label">Digite seu nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required><br>
            <input type="submit" value="Salvar Nome" class="btn btn-primary">
        </form>
    <?php else: ?>
        <p>Nome já salvo: <?php echo htmlspecialchars($_SESSION['nome']); ?></p>
        <a href="mostrar.php" class="btn btn-primary">Mostrar Nome</a>
        <a href="encerrar.php" class="btn btn-secondary">Encerrar Sessão</a>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
