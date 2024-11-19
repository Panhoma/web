<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Administração de Medicamentos</title>
</head>
<body>
    <h1>Bem-vindo ao Sistema de Administração de Medicamentos</h1>
    
    <nav>
        <?php
    // Exibindo a mensagem de sucesso, caso exista
    if (isset($_SESSION['sucesso'])) {
        echo "<p style='color: green;'>" . $_SESSION['sucesso'] . "</p>";
        unset($_SESSION['sucesso']); // Limpa a mensagem de sucesso após exibi-la
    }
    ?>
        <ul>
            <li><a href="cadastro_usuario.php">Cadastrar Médico/Enfermeiro</a></li>
            <li><a href="cadastro_paciente.php">Cadastrar Paciente</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="cadastro_receita.php">Cadastrar Receita Médica</a></li>
            <li><a href="receitas_pendentes.php">Receitas Pendentes</a></li>
            <?php if (isset($_SESSION['usuario'])): ?>
                <li><a href="logout.php">Sair</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
