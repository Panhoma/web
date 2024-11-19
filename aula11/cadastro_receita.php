<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Receita Médica</title>
</head>
<body>
    <h1>Cadastro de Receita Médica</h1>
    
    <form action="salvar_receita.php" method="POST">
        <label>Nome do paciente:</label><br>
        <input type="text" name="paciente_nome" required><br>

        <label>Nome do medicamento:</label><br>
        <input type="text" name="medicamento" required><br>
        
        <label>Data da administração:</label><br>
        <input type="date" name="data_admin" required><br>

        <label>Hora da administração:</label><br>
        <input type="time" name="hora_admin" required><br>
        
        <label>Dose:</label><br>
        <input type="text" name="dose" required><br>
        
        <input type="submit" value="Cadastrar Receita">
    </form>
</body>
</html>
