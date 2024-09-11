<?php
session_start();
require_once 'aluno.php';

$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$curso = $_POST['curso'];
$altura = $_POST['altura'];  // Atualizado

$aluno = new Aluno($nome, $nascimento, $curso, $altura);
$_SESSION['aluno'] = serialize($aluno);  // Serializa o objeto

header('Location: mostra.php');
exit();
?>
