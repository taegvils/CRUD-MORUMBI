<?php
//Modelo para Aluno
require_once(__DIR__ . "/Idolo.php");

class Tours {

    private ?int $id;
    private ?string $tipo;
    private ?int $data;
    private ?Tours $tours;
    private ?Idolo $idolo;

  public function __construct() {
        $this->id = 0;
        $this->tours = null;
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

    public function getTipo()
    {
        return $this->tipo;
    }


    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

   
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }


}
