<?php
class Aluno {
    private $nome;
    private $nascimento;
    private $curso;
    private $altura;  // Propriedade atualizada

    public function __construct($nome, $nascimento, $curso, $altura) {
        $this->nome = $nome;
        $this->nascimento = $nascimento;
        $this->curso = $curso;
        $this->altura = $altura;
    }

    public function idade() {
        $dataNascimento = new DateTime($this->nascimento);
        $dataAtual = new DateTime();
        $idade = $dataAtual->diff($dataNascimento)->y;
        return $idade;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getNascimento() {
        return $this->nascimento;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function getAltura() {
        return $this->altura;
    }
}
?>
