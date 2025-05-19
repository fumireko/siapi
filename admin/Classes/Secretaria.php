<?php
class Secretaria {
    private $id;
    private $sigla;
    private $nome;
    private $responsavel;

    public function __construct($id, $sigla, $nome, $responsavel) {
        $this->id = $id;
        $this->sigla = $sigla;
        $this->nome = $nome;
        $this->responsavel = $responsavel;
    }

    public function getId() { return $this->id; }
    public function getSigla() { return $this->sigla; }
    public function getNome() { return $this->nome; }
    public function getResponsavel() { return $this->responsavel; }
}
?>