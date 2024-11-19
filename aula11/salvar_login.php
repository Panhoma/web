<?php
session_start();
require 'conexao.php'; // Supondo que $mysqli esteja configurado corretamente

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Verificar se o usuário é médico
    $sql_medico = "SELECT * FROM medicos WHERE usuario = ?";
    $stmt_medico = $pdo->prepare($sql_medico);
    $stmt_medico->bind_param("s", $usuario); // 's' para string
    $stmt_medico->execute();
    $result_medico = $stmt_medico->get_result();
    $medico = $result_medico->fetch_assoc(); // Usar fetch_assoc() para obter um array associativo

    // Verificar se o usuário é enfermeiro
    $sql_enfermeiro = "SELECT * FROM enfermeiros WHERE usuario = ?";
    $stmt_enfermeiro = $pdo->prepare($sql_enfermeiro);
    $stmt_enfermeiro->bind_param("s", $usuario); // 's' para string
    $stmt_enfermeiro->execute();
    $result_enfermeiro = $stmt_enfermeiro->get_result();
    $enfermeiro = $result_enfermeiro->fetch_assoc(); // Usar fetch_assoc() aqui também

    // Verificar as credenciais de médico
    if ($medico && password_verify($senha, $medico['senha'])) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo'] = 'medico';
        header('Location: receitas_pendentes.php');
        exit; 
    }
    // Verificar as credenciais de enfermeiro
    elseif ($enfermeiro && password_verify($senha, $enfermeiro['senha'])) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo'] = 'enfermeiro';
        header('Location: menu.php');
        exit; 
    } else {
        // Caso o login falhe
        $_SESSION['erro'] = 'Usuário ou senha inválidos!';
        header('Location: login.php');
        exit;
    }
}
?>
