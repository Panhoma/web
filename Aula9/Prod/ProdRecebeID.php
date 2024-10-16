<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Recebe ID do Produto</title>
</head>
<body>
    <?php
    // Verifica se o ID foi passado via GET
    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']); // Protege contra XSS
    ?>
    <form action="ProdDados.php" method="GET">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="id">ID do Produto que será atualizado: <?php echo $id; ?></label><br>
            <input type="submit" value="Enviar">
        </form>
          <?php
    } else {
        echo "<p>ID do Produto não fornecido.</p>";
    }
    ?>
    <p><a href="ProdMostrar.php">Voltar</a></p> <!-- Link para voltar -->
</body>
</html>





