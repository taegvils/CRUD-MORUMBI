<?php


require_once(__DIR__ . "/../dao/ToursDAO.php");

class ToursController {

    private ToursDAO $toursDAO;

    public function __construct() {
        $this->toursDAO = new ToursDAO();
    }

    public function listar() {
        return $this->toursDAO->list();
    }

}
