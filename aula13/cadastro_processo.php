<?php
// processa_cadastro.php

// Inclui o arquivo de conexão
include('conexao.php');

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT); // Criptografa a senha
    $tecnico = $_POST['tecnico'] == 1 ? true : false; // Converte o valor do checkbox para TRUE ou FALSE

    // Verifica se o e-mail já existe no banco de dados
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $emailExists = $stmt->fetchColumn();

    if ($emailExists > 0) {
        // Se o e-mail já existe, retorna um erro
        echo json_encode(['success' => false, 'message' => 'E-mail já cadastrado']);
        exit();
    }

    // Insere o novo usuário no banco de dados
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, tecnico) VALUES (:nome, :email, :senha, :tecnico)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':tecnico', $tecnico, PDO::PARAM_BOOL);

    if ($stmt->execute()) {
        // Se a inserção for bem-sucedida, retorna uma resposta de sucesso
        echo json_encode(['success' => true]);
    } else {
        // Se a inserção falhar, retorna um erro
        echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar usuário']);
    }
}
?>
