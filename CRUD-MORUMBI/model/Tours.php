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



    /**
     * Get the value of tours
     */ 
    public function getTours()
    {
        return $this->tours;
    }

    /**
     * Set the value of tours
     *
     * @return  self
     */ 
    public function setTours($tours)
    {
        $this->tours = $tours;

        return $this;
    }

    /**
     * Get the value of idolo
     */ 
    public function getIdolo()
    {
        return $this->idolo;
    }

    /**
     * Set the value of idolo
     *
     * @return  self
     */ 
    public function setIdolo($idolo)
    {
        $this->idolo = $idolo;

        return $this;
    }
}
