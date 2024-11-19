<?php
session_start();
require 'conexao.php';

// Função para verificar se o usuário está logado
function verificarAutenticacao() {
    if (!isset($_SESSION['usuario'])) {
        return ['status' => 'erro', 'mensagem' => 'Usuário não autenticado. Faça login para continuar.'];
    }
    return null;
}



// Função para buscar receitas pendentes
function buscarReceitasPendentes($pdo) {
    $sql = "SELECT r.id AS receita_id, p.nome AS paciente_nome, r.medicamento, r.data_admin, r.hora_admin, p.leito, r.dose
            FROM receitas r
            INNER JOIN pacientes p ON r.paciente_id = p.id
            WHERE NOT EXISTS (
                SELECT 1 FROM administracoes a WHERE a.receita_id = r.id
            )";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute(); // Executa a consulta

    $result = $stmt->get_result();
    $receitas = [];
    while ($receita = $result->fetch_assoc()) {
        $receitas[] = $receita;
    }
    return $receitas;
}

// Validação de autenticação
$erroAutenticacao = verificarAutenticacao();
if ($erroAutenticacao) {
    header('Content-Type: application/json');
    echo json_encode($erroAutenticacao);
    exit;
}




// Busca as receitas pendentes
$receitas = buscarReceitasPendentes($pdo);

// Estrutura da resposta
header('Content-Type: application/json');

// Se não houver receitas pendentes
if (empty($receitas)) {
    echo json_encode([
        'status' => 'sucesso',
        'mensagem' => 'Não há receitas pendentes no momento.',
        'dados' => []
    ]);
    exit;
}

// Se houver receitas pendentes, retorna os dados com sucesso
echo json_encode([
    'status' => 'sucesso',
    'mensagem' => 'Receitas pendentes recuperadas com sucesso.',
    'dados' => $receitas
]);

?>
