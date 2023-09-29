<?php 

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Tours.php");
require_once(__DIR__ . "/../model/Vendas.php");

class AlunoDAO {

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

        $alunos = $this->mapBancoParaObjeto($result);

        if(count($alunos) == 1)
            return $alunos[0];
        elseif(count($alunos) == 0)
            return null;

        die("AlunoDAO.findById - Erro: mais de um aluno".
                " encontrado para o ID " . $id);
    }

    private function mapBancoParaObjeto($result) {
        $alunos = array();

        foreach($result as $reg) {
            $vendas = new Vendas();
            $vendas->setId($reg['id'])
                ->setNome($reg['nome'])
                ->setEstrangeiro($reg['estrangeiro'])
                ->setIdade($reg['idade']);

            $curso = new Curso();
            $curso->setId($reg['id_curso'])
                ->setNome($reg['nome_curso'])
                ->setTurno($reg['turno_curso']);            
            $aluno->setCurso($curso);

            array_push($alunos, $aluno);
        }

        return $alunos;
    }

}