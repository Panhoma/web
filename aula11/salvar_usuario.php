<?php
session_start();
require 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografando a senha

    // Determina se o usuário é médico ou enfermeiro
    $tipo_usuario = $_POST['tipo_usuario']; // 'medico' ou 'enfermeiro'

    if ($tipo_usuario == 'medico') {
        $especialidade = $_POST['especialidade'];
        $crm = $_POST['crm'];

        // Insere o médico no banco
        $sql = "INSERT INTO medicos (nome, especialidade, crm, usuario, senha) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $especialidade, $crm, $usuario, $senha]);

        // Mensagem de sucesso
        $_SESSION['sucesso'] = "Médico cadastrado com sucesso!";
    } elseif ($tipo_usuario == 'enfermeiro') {
        $coren = $_POST['coren'];

        // Insere o enfermeiro no banco
        $sql = "INSERT INTO enfermeiros (nome, coren, usuario, senha) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $coren, $usuario, $senha]);

        // Mensagem de sucesso
        $_SESSION['sucesso'] = "Enfermeiro cadastrado com sucesso!";
    }

    // Redireciona para a página de menu
    header('Location: menu.php');
    exit;
}
?>
