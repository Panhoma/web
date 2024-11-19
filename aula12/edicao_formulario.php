<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Administração de Receita</title>
</head>
<body>
    <h1>Editar Administração de Receita</h1>

    <!-- Formulário com método POST -->
    <form action="registrar_administracaoAPI.php" method="POST">
        <label for="receita_id">ID da Receita:</label>
        <input type="text" name="receita_id" id="receita_id" required><br>

        <label for="medicamento">Medicamento:</label>
        <input type="text" name="medicamento" id="medicamento" required><br>

        <label for="dose">Dose:</label>
        <input type="text" name="dose" id="dose" required><br>

        <label for="data_admin">Data de Administração:</label>
        <input type="date" name="data_admin" id="data_admin" required><br>

        <label for="hora_admin">Hora de Administração:</label>
        <input type="time" name="hora_admin" id="hora_admin" required><br>

        <button type="submit">Enviar Dados</button>
    </form>

</body>
</html>
