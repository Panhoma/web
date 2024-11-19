<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Data e Hora</title>
    <script>
        function adicionarDataHora() {
            // Captura a data e hora atuais
            const dataHoraAtual = new Date();
            
            // Formato correto para o campo datetime-local: YYYY-MM-DDTHH:MM
            const ano = dataHoraAtual.getFullYear();
            const mes = String(dataHoraAtual.getMonth() + 1).padStart(2, '0'); // Meses começam do 0, então somamos 1
            const dia = String(dataHoraAtual.getDate()).padStart(2, '0');
            const hora = String(dataHoraAtual.getHours()).padStart(2, '0');
            const minuto = String(dataHoraAtual.getMinutes()).padStart(2, '0');
            
            // Formato final para datetime-local
            const dataHoraFormatada = `${ano}-${mes}-${dia}T${hora}:${minuto}`;

            // Insere a data e hora no campo datetime-local
            document.getElementById("dataHora").value = dataHoraFormatada;
        }

        function enviarFormulario() {
            adicionarDataHora(); // Adiciona data e hora ao formulário antes de enviar
            document.getElementById("formulario").submit(); // Envia o formulário
        }
    </script>
</head>
<body>
    <h2>Formulário de Envio</h2>

    <!-- Formulário de envio com campo datetime-local e ID da receita -->
    <form id="formulario" action="remedio.php" method="POST">
        <label for="id_receita">ID da Receita:</label>
        <input type="number" id="id_receita" name="id_receita" required><br><br>

        <!-- Campo datetime-local para enviar data e hora combinadas -->
        <label for="dataHora">Data e Hora de Administração:</label>
        <input type="datetime-local" id="dataHora" name="dataHora" required><br><br>

        <button type="button" onclick="enviarFormulario()">Enviar</button>
    </form>

</body>
</html>
