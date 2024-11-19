<?php
// Incluir o arquivo de conexão com o banco de dados
include('conexao.php');

// Verificar se os dados foram enviados via POST
if (isset($_POST['id_receita']) && isset($_POST['dataHora'])) {
    $id_receita = $_POST['id_receita']; // ID da receita
    $dataHora = $_POST['dataHora']; // Data e hora de administração

    // Verificar se a dataHora foi enviada e não está vazia
    if (empty($dataHora)) {
        echo "Erro: Campo de data e hora não foi preenchido corretamente.";
        exit;
    }

    // Verificar se a dataHora está no formato esperado (YYYY-MM-DDTHH:MM)
    $dataHoraValida = DateTime::createFromFormat('Y-m-d\TH:i', $dataHora);
    if ($dataHoraValida && $dataHoraValida->format('Y-m-d\TH:i') === $dataHora) {
        // Preparar a consulta para inserir os dados na tabela 'administracoes'
        $query = "INSERT INTO administracoes (receita_id, data_registro) VALUES (?, ?)";
        $stmt = $pdo->prepare($query);
        
        // Bind os parâmetros corretamente (id_receita como inteiro, dataHora como string)
        $stmt->bind_param('is', $id_receita, $dataHora);

        if ($stmt->execute()) {
            // Sucesso: Redireciona para o menu.php
            header("Location: menu.php?status=sucesso");
            exit(); // Garante que o script seja interrompido após o redirecionamento
        } else {
            // Erro ao registrar
            echo "<p>Erro ao registrar a administração: " . $stmt->error . "</p>";
        }
    } else {
        echo "Erro: A data e hora fornecida não estão no formato correto.";
    }
} else {
    echo "<p>Dados não fornecidos corretamente.</p>";
}

// Fechar a conexão
$pdo->close();
?>
