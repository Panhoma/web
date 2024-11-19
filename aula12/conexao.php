<?php
$host = 'localhost'; // Endereço do servidor
$usuario = 'root';   // Usuário do banco de dados
$senha = '';         // Senha do banco de dados
$nome_banco = 'hospital'; // Nome do banco de dados

// Conecta ao banco de dados
try {
    $pdo = new mysqli($host, $usuario, $senha, $nome_banco);
    // Verifica se houve erro na conexão
    if ($pdo->connect_error) {
        throw new Exception("Falha ao conectar ao MySQL: " . $pdo->connect_error);
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
    exit();
}
?>
