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
                        $vendas->getNomeVisitante(), 
                        $vendas->getCpf(), 
                        $vendas->getTours(), 
                        $vendas->getIdolo()]);
    }

    public function update(Vendas $vendas) {
        $conn = Connection::getConnection();

        $sql = "UPDATE vendas SET id = ?, nomeVisitante = ?,". 
        " cpf = ?, id_idolo = ?, id_tours = ?".
        " WHERE id = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute([$vendas->getId(),
                        $vendas->getNomeVisitante(), 
                        $vendas->getCpf(), 
                        $vendas->getTours(), 
                        $vendas->getIdolo()]);
    }

    public function deleteById(int $id) {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM vendas WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function listAll() {
        $sql = "SELECT v.*, t.tipoTour" . 
                " FROM vendas v" .
                " JOIN tours t ON (t.id = v.id_tours)" . 
                " ORDER BY v.id_tours";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }
    
    public function findById(int $id) {
       $conn = Connection::getConnection();

        $sql = "SELECT v.*," . 
                " t.nome AS nome_tours, t.idolo AS idolo_tours" . 
                " FROM vendas v" .
                " JOIN tours t ON (t.id = v.id_tours)" .
                " WHERE v.id = ?";

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
    
        foreach ($result as $reg) {
            $vendas = new Vendas();
            $vendas->setId($reg['id'])
                ->setNomeVisitante($reg['nomeVisitante'])
                ->setCpf($reg['cpf']);
    
            $tours = new Tours();
            $tours->setId($reg['id']);
            $tours->setTipoTour($reg['tipoTour']);            

            $vendas->setTours($tours);
    
            // Verificar se as chaves estão definidas antes de acessá-las
            if (isset($reg['tipoTour'])) {
                $tours->setTipoTour($reg['tipoTour']);
            }
    
            if (isset($reg['dataTour'])) {
                $tours->setDataTour($reg['dataTour']);
            }
    
    
            array_push($vendass, $vendas);
        }
    
        return $vendass;
    }
    

}
