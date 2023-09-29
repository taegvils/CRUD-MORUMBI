<?php
# Classe DAO para o model de Usuario

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Idolo.php");

class IdoloDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function insert(Idolo $idolo) {
        $sql = "INSERT INTO idolo" . 
                " (nomeIdolo, id)" .
                " VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$idolo->getIdolo(), $idolo->getId()]);
    }

    public function update(Idolo $idolo) {
        $sql = "UPDATE idolo SET Idolo = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$idolo->getIdolo(), $idolo->getId()]);
    }

    public function deleteById(int $id) {
        $sql = "DELETE FROM idolo WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }
}

?>
