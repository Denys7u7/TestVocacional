<?php

class informacion {
    private $nombre = '';
    private $grupo = '';
    private $nie = '';
    private $pContaduria = 0;
    private $pSalud = 0;
    private $pTurismo = 0;
    private $pInfra = 0;
    private $pSoftware = 0;
    private $pLogistica = 0;
    private $pGeneral = 0;
    private $pAutoconocimiento = 0;
    private $pRelaciones = 0;

    function __construct($nombre,$grupo,$nie,$pContaduria,$pSalud,$pTurismo,$pInfra,$pSoftware,$pLogistica,$pGeneral,$pAutoconocimiento,$pRelaciones){
        $this->$nombre = $nombre;
        $this->$grupo = $grupo;
        $this->$pContaduria= $pContaduria;
        $this->$pSalud = $pSalud;
        $this->$pTurismo = $pTurismo;
        $this->$pInfra = $pInfra;
        $this->$pSoftware = $pSoftware;
        $this->$pLogistica = $pLogistica;
        $this->$pGeneral = $pGeneral;
        $this->$pAutoconocimiento = $pAutoconocimiento;
        $this->$pRelaciones = $pRelaciones;
    }

    public function getNombre(){
        return $this->$nombre;
    }

    public function getGrupo(){
        return $this->$grupo;
    }

    public function getNIE(){
        return $this->$nie;
    }

    public function getPContaduria(){
        return $this->$pContaduria;
    }

    public function getPSalud(){
        return $this->$pSalud;
    }

    public function getPTurismo(){
        return $this->$pTurismo;
    }

    public function getPInfra(){
        return $this->$pInfra;
    }

    public function getPSoftware(){
        return $this->$pSoftware;
    }

    public function getPLogistica(){
        return $this->$pLogistica;
    }

    public function getPGeneral(){
        return $this->$pGeneral;
    }

    public function getPAutoconocimiento(){
        return $this->$pAutoconocimiento;
    }

    public function getPRelaciones(){
        return $this->$pRelaciones;
    }
}

?>