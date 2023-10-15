<?php

//require_once(__DIR__ . '/../../model/Vendas.php');

class Idolo {

    private ?int $id;
    private ?Idolo $idolo;

  public function __construct() {
        $this->id = 0;
        $this->idolo = null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getIdolo()
    {
        return $this->idolo;
    }

    public function setIdolo($idolo)
    {
        $this->idolo = $idolo;

        return $this;
    }

}
