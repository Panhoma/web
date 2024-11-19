<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Paciente</title>
</head>
<body>
    <h1>Cadastro de Paciente</h1>
    
    <form action="salvar_paciente.php" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br>
        
        <label>Leito:</label><br>
        <input type="text" name="leito" required><br>
        
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
