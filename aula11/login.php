<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login de Usuário</h1>
    
    <form action="salvar_login.php" method="POST">
        <label>Usuário:</label><br>
        <input type="text" name="usuario" required><br>
        
        <label>Senha:</label><br>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
