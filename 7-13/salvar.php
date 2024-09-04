<?php
session_start();
if (isset($_POST['nome'])) {
    $_SESSION['nome'] = $_POST['nome'];
}
header('Location: primeira.php');
exit();
