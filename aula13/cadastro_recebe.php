<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form id="formCadastro" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="tecnico">Técnico:</label>
        <input type="checkbox" id="tecnico" name="tecnico"><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <div id="mensagem"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#formCadastro').submit(function(e){
                e.preventDefault();

                // Coleta os dados do formulário
                var nome = $('#nome').val();
                var email = $('#email').val();
                var senha = $('#senha').val();
                var tecnico = $('#tecnico').prop('checked') ? 1 : 0; // Se o checkbox estiver marcado, valor 1, caso contrário 0.

                // Envia os dados via AJAX
                $.ajax({
                    url: 'cadastro_processo.php',
                    type: 'POST',
                    data: {
                        nome: nome,
                        email: email,
                        senha: senha,
                        tecnico: tecnico
                    },
                    dataType: 'json',
                    success: function(response){
                        if(response.success) {
                            $('#mensagem').html('<p>Cadastro realizado com sucesso!</p>');
                            $('#formCadastro')[0].reset(); // Limpa os campos do formulário
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
