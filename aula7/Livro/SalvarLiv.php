<?php

$servidor = 'localhost';
$banco = 'livros'; 
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $titulo = $_POST['titulo'];
    $idioma = $_POST['idioma'];
    $quantidade_paginas = (int) $_POST['quantidade_paginas'];
    $editora = $_POST['editora'];
    $data_publicacao = $_POST['data_publicacao'];
    $isbn = $_POST['isbn'];

    echo "Recebido: <br>";
    echo "Título: " . htmlspecialchars($titulo) . "<br>";
    echo "Idioma: " . htmlspecialchars($idioma) . "<br>";
    echo "Quantidade de Páginas: " . htmlspecialchars($quantidade_paginas) . "<br>";
    echo "Editora: " . htmlspecialchars($editora) . "<br>";
    echo "Data da Publicação: " . htmlspecialchars($data_publicacao) . "<br>";
    echo "ISBN: " . htmlspecialchars($isbn) . "<br>";

    // Comando SQL para inserir os dados
    $codigoSQL = "INSERT INTO `livro`(`ID`, `Titulo`, `Idioma`, `qtdPaginas`, `Editora`, `dataPublicacao`, `ISBN`) VALUES (null, :titulo, :idioma, :quantidade_paginas, :editora, :data_publicacao, :isbn)";
    $comando = $conexao->prepare($codigoSQL);
    $resultado = $comando->execute(array('titulo' => $titulo,'idioma' => $idioma,'quantidade_paginas' => $quantidade_paginas,'editora' => $editora,'data_publicacao' => $data_publicacao,'isbn' => $isbn));

    if ($resultado) {
        echo "Livro cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o livro.";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

$conexao = null;
?>
