<?php
session_start();

require_once 'produto.php'; 

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: novo.php");
    exit();
}


$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$valor = isset($_POST['valor']) ? $_POST['valor'] : 0;
$imagemUrl = isset($_POST['imagemUrl']) ? $_POST['imagemUrl'] : '';


if (!empty($nome) && !empty($descricao) && $valor > 0 && !empty($imagemUrl)) {
    $produto = new Produto($nome, $descricao, $valor, $imagemUrl);

    if (!isset($_SESSION['produtos'])) {
        $_SESSION['produtos'] = [];
    }
    

    $_SESSION['produtos'][] = serialize($produto);

    echo '<pre>';
    print_r($_SESSION['produtos']);
    echo '</pre>';

    header("Location: mostra.php");
    exit();
} else {

    header("Location: novo.php");
    exit();
}
?>
