<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Recebe ID do Time</title>
</head>
<body>
    <?php
    // Verifica se o ID foi passado via GET
    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']); // Protege contra XSS
    ?>
        <form action="FutDados.php" method="GET">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="id">ID do Time que será atualizado: <?php echo $id; ?></label><br>
            <input type="submit" value="Enviar">
        </form>
    <?php
    } else {
        echo "<p>ID do time não fornecido.</p>";
    }
    ?>
    <p><a href="FutMostrar.php">Voltar</a></p> <!-- Link para voltar -->
</body>
</html>
