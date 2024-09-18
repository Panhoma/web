<?php
session_start();
require_once 'produto.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
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
    <h2>Produtos Cadastrados</h2>
    <div class="row">
        <?php

        if (isset($_SESSION['produtos']) && !empty($_SESSION['produtos'])) {
            foreach ($_SESSION['produtos'] as $produtos) {
                if (is_string($produtos)) {
                    $produto = unserialize($produtos);
                    if ($produto instanceof Produto) {
                        $produto->exibirInformacoes();
                    } else {
                        echo '<p>Erro ao deserializar produto.</p>';
                    }
                }
            }
        } else {
            echo '<p>Nenhum produto cadastrado.</p>';
        }
        ?>
    </div>
</div>
</body>
</html>
