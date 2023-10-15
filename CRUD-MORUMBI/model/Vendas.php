<?php

//require_once(__DIR__ . "/../../model/Idolo.php");

class Vendas {

    private ?int $id;
    private ?string $nomeVisitante;
    private ?int $cpf;
    private ?Idolo $idolo;
    private ?Tours $tours;
    
    public function __construct() {
        $this->id = 0;
        $this->nomeVisitante = null;
        $this->cpf = null;
        $this->idolo = null;
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

    public function getNomeVisitante()
    {
        return $this->nomeVisitante;
    }

   
    public function setNomeVisitante($nomeVisitante)
    {
        $this->nomeVisitante = $nomeVisitante;

        return $this;
    }

   
    public function getCpf()
    {
        return $this->cpf;
    }

   
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

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
