<?php
$servidor = 'localhost';
$banco = 'futebol';
$usuario = 'root';
$senha = '';

try {
    // Conexão com o banco de dados
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Time</title>
</head>
<body>
    <h1>Atualização de Time</h1>
    
    <?php
    $id = $_GET['id'] ?? null;

    if ($id) {
        $comandoSQL = "SELECT `nome`, `pontos` FROM `times` WHERE `id` = :id";
        $comando = $conexao->prepare($comandoSQL);
        $comando->execute(['id' => $id]);

        if ($linha = $comando->fetch()) {
    ?>
    <form action="FutAtualiza.php" method="GET">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($linha['nome']) ?>" required><br>
        
        <label for="pontos">Pontos:</label>
        <input type="text" name="pontos" value="<?= htmlspecialchars($linha['pontos']) ?>" required><br>
        
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <input type="submit" value="Atualizar">
    </form>
    <?php
        } else {
            echo "<p>Time não encontrado.</p>";
        }
    } else {
    ?>
    <form action="FutDados.php" method="GET">
        <label for="id">ID do Time que será atualizado:</label>
        <input type="text" name="id" required><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    }
    ?>
</body>
</html>
