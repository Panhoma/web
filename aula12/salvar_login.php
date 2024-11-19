<?php
session_start();
require 'conexao.php'; // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Consultar as duas tabelas de uma vez (medicos e enfermeiros), garantindo que ambas tenham o mesmo número de colunas
    $sql = "
        SELECT id, usuario, senha, 'medico' AS tipo, crm AS identificador FROM medicos WHERE usuario = ? 
        UNION 
        SELECT id, usuario, senha, 'enfermeiro' AS tipo, coren AS identificador FROM enfermeiros WHERE usuario = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bind_param("ss", $usuario, $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    $user = $result->fetch_assoc(); // Obtém o usuário encontrado (se houver)

    if ($user) {
        // Verifica se a senha fornecida corresponde à senha do banco
        if (password_verify($senha, $user['senha'])) {
            // Se for um médico
            if ($user['tipo'] === 'medico') {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['tipo'] = 'medico';  // Armazena o tipo de usuário
                $_SESSION['crm'] = $user['identificador']; // Salva o CRM do médico
            } 
            // Se for um enfermeiro
            elseif ($user['tipo'] === 'enfermeiro') {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['tipo'] = 'enfermeiro';  // Armazena o tipo de usuário
                $_SESSION['coren'] = $user['identificador']; // Salva o COREN do enfermeiro
            }
            
            // Redireciona para o menu
            header('Location: menu.php');
            exit;
        } else {
            // Caso a senha esteja incorreta
            $_SESSION['erro'] = 'Senha inválida!';
            header('Location: login.php');
            exit;
        }
    } else {
        // Caso o usuário não seja encontrado
        $_SESSION['erro'] = 'Usuário não encontrado!';
        header('Location: login.php');
        exit;
    }
}
?>
