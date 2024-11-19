<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Paciente</title>
    <script>
        function enviarCadastro() {
            var nome = document.getElementById('nome').value;
            var leito = document.getElementById('leito').value;

            var dados = {
                nome: nome,
                leito: leito
            };

            fetch('salvar_pacienteAPI.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dados)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'sucesso') {
                    alert(data.mensagem);
                    // Opcional: redireciona ou limpa o formulário após sucesso
                } else {
                    alert('Erro: ' + data.mensagem);
                }
            })
            .catch(error => alert('Erro na requisição: ' + error));
        }
    </script>
</head>
<body>
    <h1>Cadastro de Paciente</h1>
    
    <form onsubmit="event.preventDefault(); enviarCadastro();">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br>
        
        <label for="leito">Leito:</label><br>
        <input type="text" id="leito" name="leito" required><br>
        
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
