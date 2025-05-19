<?php
require_once __DIR__ . '/../Secretaria.php';
require_once __DIR__ . '/../Departamento.php';

class DepartamentoDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function buscarDepartamentos() {
        $sql = "SELECT tbcmei_id, tbcmei_nome, interno, tbcmei_local, tbcmei_preescolar, 
                tbcmei_dataalt, tbcmei_tel, tbcmei_coord, tbcmei_email, tbcmei_cep, 
                tbcmei_end, tbcmei_num, tbcmei_comp, tbcmei_bairro, tbcmei_regiao, 
                tbcmei_cidade, tbcmei_login, tbcmei_sec_id
                FROM tbcmei
                ORDER BY tbcmei_nome";

        $result = mysqli_query($this->conn, $sql);
        $departamentos = array();

        while ($row = mysqli_fetch_assoc($result)) {
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

            array_push($departamentos, $departamento);
        }

        return $departamentos;
    }

    public function getDepartamentoById($id) {
        $sql = "SELECT tbcmei_id, tbcmei_nome, interno, tbcmei_local, tbcmei_preescolar, 
                tbcmei_dataalt, tbcmei_tel, tbcmei_coord, tbcmei_email, tbcmei_cep, 
                tbcmei_end, tbcmei_num, tbcmei_comp, tbcmei_bairro, tbcmei_regiao, 
                tbcmei_cidade, tbcmei_login, tbcmei_sec_id
                FROM tbcmei
                WHERE tbcmei_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

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

        return $departamento;
    }
}
?>