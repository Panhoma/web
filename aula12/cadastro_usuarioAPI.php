<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <script>
       function enviarCadastro() {
    var nome = document.getElementById('nome').value;
    var usuario = document.getElementById('usuario').value;
    var senha = document.getElementById('senha').value;
    var tipo_usuario = document.getElementById('tipo_usuario').value;
    var especialidade = document.getElementById('especialidade').value;
    var crm = document.getElementById('crm').value;
    var coren = document.getElementById('coren').value;

    var dados = {
        nome: nome,
        usuario: usuario,
        senha: senha,
        tipo_usuario: tipo_usuario
    };

    if (tipo_usuario === 'medico') {
        dados.especialidade = especialidade;
        dados.crm = crm;
    } else if (tipo_usuario === 'enfermeiro') {
        dados.coren = coren;
    }

    fetch('salvar_usuarioAPI.php', {
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
    <h1>Cadastro de Usuário</h1>

    <form onsubmit="event.preventDefault(); enviarCadastro();">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="tipo_usuario">Tipo de Usuário:</label>
        <select name="tipo_usuario" id="tipo_usuario" required>
            <option value="medico">Médico</option>
            <option value="enfermeiro">Enfermeiro</option>
        </select><br><br>

        <div id="medico_fields" style="display:none;">
            <label for="especialidade">Especialidade:</label>
            <input type="text" id="especialidade" name="especialidade"><br><br>

            <label for="crm">CRM:</label>
            <input type="text" id="crm" name="crm"><br><br>
        </div>

        <div id="enfermeiro_fields" style="display:none;">
            <label for="coren">COREN:</label>
            <input type="text" id="coren" name="coren"><br><br>
        </div>

        <input type="submit" value="Cadastrar">
    </form>

    <br>
    <a href="menu.php">Voltar ao Menu</a>

    <script>
        // Exibe ou esconde campos extras dependendo do tipo de usuário
        document.getElementById('tipo_usuario').addEventListener('change', function() {
            var tipo = this.value;
            if (tipo === 'medico') {
                document.getElementById('medico_fields').style.display = 'block';
                document.getElementById('enfermeiro_fields').style.display = 'none';
            } else if (tipo === 'enfermeiro') {
                document.getElementById('enfermeiro_fields').style.display = 'block';
                document.getElementById('medico_fields').style.display = 'none';
            }
        });

        // Dispara ao carregar para o tipo de usuário selecionado por padrão
        document.getElementById('tipo_usuario').dispatchEvent(new Event('change'));
    </script>
</body>
</html>
