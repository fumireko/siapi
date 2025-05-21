<?php
class Chamado {
    private $id;
    private $nomeSolicitante;
    private $email;
    private $dataAbertura;
    private $horaAbertura;
    private $problema;
    private $solucao;
    private $regiao;
    private $secretaria;
    private $departamento;
    private $telefone;
    private $tipoServico;
    private $atendente;
    private $dataFinalizado;
    private $horaFinalizado;
    private $status;
    private $tipoSolucao;

    public function __construct($id, $nomeSolicitante, $email, $dataAbertura, $horaAbertura, $problema, $solucao, $regiao, $secretaria, $departamento, $telefone, $tipoServico, $atendente, $dataFinalizado = null, $horaFinalizado = null, $status = "Aberto", $tipoSolucao) {
        $this->id = $id;
        $this->nomeSolicitante = $nomeSolicitante;
        $this->email = $email;
        $this->dataAbertura = $dataAbertura;
        $this->horaAbertura = $horaAbertura;
        $this->problema = $problema;
        $this->solucao = $solucao;
        $this->regiao = $regiao;
        $this->secretaria = $secretaria;
        $this->departamento = $departamento;
        $this->telefone = $telefone;
        $this->tipoServico = $tipoServico;
        $this->atendente = $atendente;
        $this->dataFinalizado = $dataFinalizado;
        $this->horaFinalizado = $horaFinalizado;
        $this->status = $status;
        $this->tipoSolucao = $tipoSolucao;
    }

    public function getId() { return $this->id; }
    public function getNomeSolicitante() { return $this->nomeSolicitante; }
    public function getEmail() { return $this->email; }
    public function getDataAbertura() { return $this->dataAbertura; }
    public function getHoraAbertura() { return $this->horaAbertura; }
    public function getProblema() { return $this->problema; }
    public function getSolucao() { return $this->solucao; }
    public function getRegiao() { return $this->regiao; }
    public function getSecretaria() { return $this->secretaria; }
    public function getDepartamento() { return $this->departamento; }
    public function getTelefone() { return $this->telefone; }
    public function getTipoServico() { return $this->tipoServico; }
    public function getAtendente() { return $this->atendente; }
    public function getDataFinalizado() { return $this->dataFinalizado; }
    public function getHoraFinalizado() { return $this->horaFinalizado; }
    public function getStatus() { return $this->status; }
    public function getTipoSolucao() { return $this->tipoSolucao; }

    public function setId($id) { $this->id = $id; }
    public function setNomeSolicitante($nomeSolicitante) { $this->nomeSolicitante = $nomeSolicitante; }
    public function setEmail($email) { $this->email = $email; }
    public function setDataAbertura($dataAbertura) { $this->dataAbertura = $dataAbertura; }
    public function setHoraAbertura($horaAbertura) { $this->horaAbertura = $horaAbertura; }
    public function setProblema($problema) { $this->problema = $problema; }
    public function setSolucao($solucao) { $this->solucao = $solucao; }
    public function setRegiao($regiao) { $this->regiao = $regiao; }
    public function setSecretaria($secretaria) { $this->secretaria = $secretaria; }
    public function setDepartamento($departamento) { $this->departamento = $departamento; }
    public function setTelefone($telefone) { $this->telefone = $telefone; }
    public function setTipoServico($tipoServico) { $this->tipoServico = $tipoServico; }
    public function setAtendente($atendente) { $this->atendente = $atendente; }
    public function setDataFinalizado($dataFinalizado) { $this->dataFinalizado = $dataFinalizado; }
    public function setHoraFinalizado($horaFinalizado) { $this->horaFinalizado = $horaFinalizado; }
    public function setStatus($status) { $this->status = $status; }
    public function setTipoSolucao($tipoSolucao) { $this->tipoSolucao = $tipoSolucao; }
}
?>