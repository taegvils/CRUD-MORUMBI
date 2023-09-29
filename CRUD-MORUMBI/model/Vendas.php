<?php

require_once(__DIR__ . "/?.php");

class Vendas {

    private ?int $id;
    private ?string $nome;
    private ?int $cpf;
    private ?int $id_idolo;
    private ?int $id_tours;
    private ?Vendas $vendas;

  public function __construct() {
        $this->id = 0;
        $this->vendas = null;
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

    public function getId_Tours()
    {
        return $this->id_tours;
    }

   
    public function setId_Tours($id_tours)
    {
        $this->id_tours = $id_tours;

        return $this;
    }

    public function getId_Idolo()
    {
        return $this->id_idolo;
    }

   
    public function setId_Idolo($id_idolo)
    {
        $this->id_idolo = $id_idolo;

        return $this;
    }


}
