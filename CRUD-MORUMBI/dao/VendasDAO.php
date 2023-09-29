<?php 

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Tours.php");
require_once(__DIR__ . "/../model/Vendas.php");

class VendasDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function insert(Vendas $vendas) {
        $sql = "INSERT INTO vendas" . 
                " (id, nomeVisitante, cpf, id_idolo, id_tours)" .
                " VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$vendas->getId(),
                        $vendas->getNome(), 
                        $vendas->getCpf(), 
                        $vendas->getId_Tours(), 
                        $vendas->getId_Idolo()]);
    }

    public function update(Vendas $vendas) {
        $conn = Connection::getConnection();

        $sql = "UPDATE vendas SET id = ?, nomeVisitante = ?,". 
            " cpf = ?, id_idolos = ?, id_tours".
            " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$vendas->getId(),
                        $vendas->getNome(), 
                        $vendas->getCpf(), 
                        $vendas->getId_Tours(), 
                        $vendas->getId_Idolo()]);
    }

    public function deleteById(int $id) {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM vendas WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function list() {
        $sql = "SELECT v.*," . 
                " t.nome AS nome_curso, c.turno AS turno_curso" . 
                " FROM alunos a" .
                " JOIN cursos c ON (c.id = a.id_curso)" . 
                " ORDER BY a.nome";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    public function findById(int $id) {
        $conn = Connection::getConnection();

        $sql = "SELECT a.*," . 
                " c.nome AS nome_curso, c.turno AS turno_curso" . 
                " FROM alunos a" .
                " JOIN cursos c ON (c.id = a.id_curso)" .
                " WHERE a.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        $vendas = $this->mapBancoParaObjeto($result);

        if(count($vendas) == 1)
            return $vendas[0];
        elseif(count($vendas) == 0)
            return null;

        die("VendasDAO.findById - Erro: mais de uma venda".
                " encontrado para o ID " . $id);
    }

    private function mapBancoParaObjeto($result) {
        $vendass = array();

        foreach($result as $reg) {
            $vendas = new Vendas();
            $vendas->setId($reg['id'])
            ->setNome($reg['nomeVisitante'])
            ->setCpf($reg['cpf'])
            ->setId_Idolo($reg['id_idolo'])
            ->setId_Tours($reg['id_tours']);

            $tours = new Tours();
            $tours->setId($reg['id'])
                ->setTipo($reg['tipoTour'])
                ->setData($reg['dataTour']);            
            $vendas->setId_Tours($tours);

            array_push($vendass, $vendas);
        }

        return $vendass;
    }

}