<?php


class Vendas {

    private ?int $id;
    private ?string $nome;
    private ?int $cpf;
    private ?Idolo $idolo;
    private ?Tours $tours;
    
    public function __construct() {
        $this->id = 0;
        $this->nome = null;
        $this->cpf = null;
        $this->idolo = null; // Inicializa a propriedade $id_idolo como nula
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

    public function getNome()
    {
        return $this->nome;
    }

   
    public function setNome($nome)
    {
        $this->nome = $nome;

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
