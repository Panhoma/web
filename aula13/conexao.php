<?php
// Configurações de conexão com o banco de dados
$host = 'localhost';  // Endereço do servidor (pode ser 'localhost' ou IP do servidor)
$dbname = 'sch';      // Nome do banco de dados
$username = 'root';   // Usuário do banco de dados
$password = '';       // Senha do banco de dados

try {
    // Criação de uma instância PDO para conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Definindo o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Definindo o charset para UTF-8, para evitar problemas com caracteres especiais
    $pdo->exec("SET NAMES 'utf8'");

} catch (PDOException $e) {
    // Se ocorrer um erro, exibe a mensagem de erro
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
