<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Idolo.php");


class ToursDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM tours";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    private function mapBancoParaObjeto($result) {
        $tours = array();
        foreach($result as $reg) {
            $tours = new Tours();
            $tours->setId($reg['id'])
                ->setTipo($reg['tipo'])
                ->setData($reg['data']);
            array_push($idolo, $tours);
        }

        return $tours;
    }

}
