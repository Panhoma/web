<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Departamento</title>
</head>
<body>
    <h1>Cadastro de Departamento</h1>
    <form id="formDepartamento" method="post">
        <label for="nome">Nome do Departamento:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <button type="submit">Cadastrar Departamento</button>
    </form>

    <div id="mensagem"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#formDepartamento').submit(function(e){
                e.preventDefault();  // Impede o envio do formulário de forma tradicional

                // Coleta o nome do departamento
                var nome = $('#nome').val();

                // Envia os dados via AJAX
                $.ajax({
                    url: 'departamento_processo.php',
                    type: 'POST',
                    data: { nome: nome },
                    dataType: 'json',
                    success: function(response){
                        // Exibe a mensagem de sucesso ou erro
                        if(response.success) {
                            $('#mensagem').html('<p>Departamento cadastrado com sucesso!</p>');

                            // Limpa o campo de entrada após o cadastro bem-sucedido
                            $('#formDepartamento')[0].reset();
                        } else {
                            $('#mensagem').html('<p>Erro: ' + response.message + '</p>');
                        }
                    },
                    error: function() {
                        $('#mensagem').html('<p>Ocorreu um erro ao processar o cadastro.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
