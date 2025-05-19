<?php
class Departamento {
    private $id;
    private $nome;
    private $interno;
    private $local;
    private $preEscolar;
    private $dataAlt;
    private $telefone;
    private $coordenador;
    private $email;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $regiao;
    private $cidade;
    private $login;
    private $secretariaId;

    public function __construct($id, $nome, $interno, $local, $preEscolar, $dataAlt, $telefone, 
        $coordenador, $email, $cep, $endereco, $numero, $complemento, $bairro, $regiao, 
        $cidade, $login, $secretariaId) {
        
        $this->id = $id;
        $this->nome = $nome;
        $this->interno = $interno;
        $this->local = $local;
        $this->preEscolar = $preEscolar;
        $this->dataAlt = $dataAlt;
        $this->telefone = $telefone;
        $this->coordenador = $coordenador;
        $this->email = $email;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->regiao = $regiao;
        $this->cidade = $cidade;
        $this->login = $login;
        $this->secretariaId = $secretariaId;
    }

    // Métodos getters
    public function getId() { return $this->id; }
    public function getNome() { return $this->nome; }
    public function getIntern() { return $this->interno; }
    public function getLocal() { return $this->local; }
    public function getPreEscolar() { return $this->preEscolar; }
    public function getDataAlt() { return $this->dataAlt; }
    public function getTelefone() { return $this->telefone; }
    public function getCoordenador() { return $this->coordenador; }
    public function getEmail() { return $this->email; }
    public function getCep() { return $this->cep; }
    public function getEndereco() { return $this->endereco; }
    public function getNumero() { return $this->numero; }
    public function getComplemento() { return $this->complemento; }
    public function getBairro() { return $this->bairro; }
    public function getRegiao() { return $this->regiao; }
    public function getCidade() { return $this->cidade; }
    public function getLogin() { return $this->login; }
    public function getSecretariaId() { return $this->secretariaId; }

    // Métodos setters
    public function setId($id) { $this->id = $id; }
    public function setNome($nome) { $this->nome = $nome; }
    public function setIntern($interno) { $this->interno = $interno; }
    public function setLocal($local) { $this->local = $local; }
    public function setPreEscolar($preEscolar) { $this->preEscolar = $preEscolar; }
    public function setDataAlt($dataAlt) { $this->dataAlt = $dataAlt; }
    public function setTelefone($telefone) { $this->telefone = $telefone; }
    public function setCoordenador($coordenador) { $this->coordenador = $coordenador; }
    public function setEmail($email) { $this->email = $email; }
    public function setCep($cep) { $this->cep = $cep; }
    public function setEndereco($endereco) { $this->endereco = $endereco; }
    public function setNumero($numero) { $this->numero = $numero; }
    public function setComplemento($complemento) { $this->complemento = $complemento; }
    public function setBairro($bairro) { $this->bairro = $bairro; }
    public function setRegiao($regiao) { $this->regiao = $regiao; }
    public function setCidade($cidade) { $this->cidade = $cidade; }
    public function setLogin($login) { $this->login = $login; }
    public function setSecretariaId($secretariaId) { $this->secretariaId = $secretariaId; }
}
?>