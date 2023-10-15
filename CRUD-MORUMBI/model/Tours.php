<?php
//Modelo para Aluno
//require_once(__DIR__ . "/Idolo.php");

class Tours {

    private ?int $id;
    private ?string $tipoTour;
    private ?string $dataTour;

  public function __construct() {
        $this->id = 0;
        $this->tipoTour = null;
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

    public function getTipoTour()
    {
        return $this->tipoTour;
    }


    public function setTipoTour($tipoTour)
    {
        $this->tipoTour = $tipoTour;

        return $this;
    }

    public function getDataTour()
    {
        return $this->dataTour;
    }

   
    public function setDataTour($dataTour)
    {
        $this->dataTour = $dataTour;

        return $this;
    }


}
