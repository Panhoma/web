<?php
class Produto {
    private $nome;
    private $descricao;
    private $valor;
    private $imagemUrl;

    public function __construct($nome, $descricao, $valor, $imagemUrl) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->imagemUrl = $imagemUrl;
    }

    public function exibirInformacoes() {
        echo '<div class="card" style="width: 20rem;">';
        echo '<img src="' . $this->imagemUrl . '" class="card-img-top" alt="' . $this->nome . '" style="height: 200px;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $this->nome . '</h5>';
        echo '<p class="card-text">' . $this->descricao . '</p>';
        echo '<p class="card-text"><strong>Preço: </strong>' . number_format($this->valor, 2, ',', '.') . '</p>';
        echo '</div>';
        echo '</div>';
    }
}
?>
