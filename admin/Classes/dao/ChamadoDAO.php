<?php
require_once __DIR__ . '/../Chamado.php';
require_once __DIR__ . '/../Secretaria.php';
require_once __DIR__ . '/../Departamento.php';

class ChamadoDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function buscarChamados($regiao = null, $status = null, $itensPorPagina = null, $pagina = null, $busca = null, $tipoSolucao = null) {
        $offset = ($pagina -1) * $itensPorPagina;
        
        $sql = "SELECT *
                FROM tbldados td
                INNER JOIN tbsecretaria s ON td.id_sec = s.sec_id
                INNER JOIN tbcmei d ON td.id_setor = d.tbcmei_id";
        
        $filtros = $this->construirFiltros($regiao, $status, $busca);
        $sql = $this->adicionarFiltrosSql($sql, $filtros);
        
        $sql .= " ORDER BY td.id_dados DESC";
        $sql .= " LIMIT $itensPorPagina OFFSET $offset";
        
        $result = mysqli_query($this->conn, $sql);
        $chamados = array();
    
        while ($row = mysqli_fetch_assoc($result)) {
            $secretaria = new Secretaria(
                $row['sec_id'],
                $row['sec_sigla'],
                $row['sec_nome'],
                $row['sec_resp']
            );
    
            $departamento = new Departamento(
                $row['tbcmei_id'],
                $row['tbcmei_nome'],
                $row['interno'],
                $row['tbcmei_local'],
                $row['tbcmei_preescolar'],
                $row['tbcmei_dataalt'],
                $row['tbcmei_tel'],
                $row['tbcmei_coord'],
                $row['tbcmei_email'],
                $row['tbcmei_cep'],
                $row['tbcmei_end'],
                $row['tbcmei_num'],
                $row['tbcmei_comp'],
                $row['tbcmei_bairro'],
                $row['tbcmei_regiao'],
                $row['tbcmei_cidade'],
                $row['tbcmei_login'],
                $row['tbcmei_sec_id']
            );
    
            $chamado = new Chamado(
                $row['id_dados'],
                $row['nsolicitante'],
                $row['email'],
                $row['data'],
                $row['hora'],
                $row['prob'],
                $row['solucao'],
                $row['regiao'],
                $secretaria,
                $departamento,
                $row['telefone'],
                $row['tpservico'],
                $row['tecnico'],
                $row['dtafin'],
                $row['cha_horaf'],
                $row['status'],
                $row['tbldados_equipe']
            );
    
            array_push($chamados, $chamado);
        }
    
        return $chamados;
    }

    public function contarChamados($regiao = null, $status = null, $busca = null) {
        $sql = "SELECT COUNT(*) as total
                FROM tbldados td
                INNER JOIN tbsecretaria s ON td.id_sec = s.sec_id
                INNER JOIN tbcmei d ON td.id_setor = d.tbcmei_id";
        
        $filtros = $this->construirFiltros($regiao, $status, $busca);
        $sql = $this->adicionarFiltrosSql($sql, $filtros);
        
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    private function construirFiltros($regiao = null, $status = null, $busca = null) {
        $filtros = array();
        if ($regiao) {
            $filtros[] = "td.regiao LIKE '%$regiao%'";
        }
        if ($status) {
            if (is_array($status)) {
                $statusEscaped = array();
                foreach ($status as $s) {
                    $statusEscaped[] = "'" . $this->conn->real_escape_string($s) . "'";
                }
                $filtros[] = "td.status IN (" . implode(', ', $statusEscaped) . ")";
            } else {
                $filtros[] = "td.status = '" . $this->conn->real_escape_string($status) . "'";
            }
        }
        if ($busca) {
            $filtrado = $this->conn->real_escape_string($busca);
            $sqlBusca = " (td.nsolicitante LIKE '%$filtrado%' 
                          OR td.prob LIKE '%$filtrado%' 
                          OR td.solucao LIKE '%$filtrado%'
                          OR d.tbcmei_nome LIKE '%$filtrado%')";
            $filtros[] = $sqlBusca;
        }
        return $filtros;
    }

    private function adicionarFiltrosSql($sql, $filtros) {
        if (!empty($filtros)) {
            $sql .= " WHERE " . implode(" AND ", $filtros);
        }
        return $sql;
    }

    public function getChamadoById($id) {
        $sql = "SELECT * FROM tbldados td
                INNER JOIN tbsecretaria s ON td.id_sec = s.sec_id
                INNER JOIN tbcmei d ON td.id_setor = d.tbcmei_id
                WHERE td.id_dados = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        
        $secretaria = new Secretaria(
            $row['sec_id'],
            $row['sec_sigla'],
            $row['sec_nome'],
            $row['sec_resp']
        );
        
        $departamento = new Departamento(
            $row['tbcmei_id'],
            $row['tbcmei_nome'],
            $row['interno'],
            $row['tbcmei_local'],
            $row['tbcmei_preescolar'],
            $row['tbcmei_dataalt'],
            $row['tbcmei_tel'],
            $row['tbcmei_coord'],
            $row['tbcmei_email'],
            $row['tbcmei_cep'],
            $row['tbcmei_end'],
            $row['tbcmei_num'],
            $row['tbcmei_comp'],
            $row['tbcmei_bairro'],
            $row['tbcmei_regiao'],
            $row['tbcmei_cidade'],
            $row['tbcmei_login'],
            $row['tbcmei_sec_id']
        );
        
        $chamado = new Chamado(
            $row['id_dados'],
            $row['nsolicitante'],
            $row['email'],
            $row['data'],
            $row['hora'],
            $row['prob'],
            $row['solucao'],
            $row['regiao'],
            $secretaria,
            $departamento,
            $row['telefone'],
            $row['tpservico'],
            $row['tecnico'],
            $row['dtafin'],
            $row['cha_horaf'],
            $row['status'],
            $row['tbldados_equipe'] 
        );
        
        return $chamado;
    }
    
    public function podeFinalizar($id) {
        $sql = "SELECT 1 FROM tbldados WHERE id_dados = ? AND solucao IS NOT NULL";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }

    public function podeDevolver($id) {
        $sql = "SELECT 1 FROM tbldados WHERE id_dados = ? AND solucao IS NOT NULL AND status = ?";
        $stmt = $this->conn->prepare($sql);
        $status = 'finalizado';
        $stmt->bind_param("is", $id, $status);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }
    
    public function finalizarChamado($id, $tecnico, $hora) {
        $sql = "UPDATE tbldados SET status = 'finalizado', dtafin = NOW(), cha_horaf = ?, tecnico = ? WHERE id_dados = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $hora, $tecnico, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function devolverChamado($id, $tecnico, $hora) {
        $sql = "UPDATE tbldados SET status = 'Pendente', dtafin = NOW(), cha_horaf = ?, tecnico = ? WHERE id_dados = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $hora, $tecnico, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
    
    public function atualizarSolucao($id, $solucao, $tipoSolucao, $tecnico, $hora) {
        $sql = "UPDATE tbldados 
                SET solucao = ?, 
                    tbldados_equipe = ?, 
                    dtaatendido = NOW(), 
                    cha_horai = ?, 
                    tecnico = ?, 
                    status = ? 
                WHERE id_dados = ?";
        
        $status = 'atendendo';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssi", $solucao, $tipoSolucao, $hora, $tecnico, $status, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}
?>