<?php
session_start(); // Inicia a sessão
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <h1>Bem-vindo, 
        <?php 
        // Verificar se a variável 'usuario' está definida na sessão
        if (isset($_SESSION['usuario'])) {
            echo $_SESSION['usuario'];
        } else {
            echo "Guest";
        }
        ?>!
    </h1>
    
    <nav>
        <ul>
            <!-- Links existentes -->
            <li><a href="login.php">Login</a></li>
            

            <!-- Links para Cadastro de Paciente, Médico e Enfermeiro -->
            <li><a href="cadastro_pacienteAPI.php">Cadastrar Paciente</a></li>
            <li><a href="cadastro_usuarioAPI.php">Cadastrar Usuário</a></li>
            

            <!-- Mostrar a opção de alterar receita apenas para médicos -->
            <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'medico') : ?>
                <li><a href="edicao_formulario.php">Alterar Receita</a></li>
                <li><a href="cadastro_receita.php">Cadastrar Nova Receita</a></li>
            <li><a href="receitas_pendentesAPI.php">Ver Receitas Pendentes</a></li>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'enfermeiro') : ?>
            <!-- Apenas enfermeiros podem aplicar medicamento -->
            <li><a href="receitas_pendentesAPI.php">Ver Receitas Pendentes</a></li>
            <li><a href="receita_envio.php">selecionar receita</a></li>
            <?php endif; ?>

            <!-- Link para logout -->
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
