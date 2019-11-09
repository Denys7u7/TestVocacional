<?php

include_once("informacion.class.php");
include_once('conexion.php');

class InformacionModel {
    
    function __construct(){

    }

    public function addInformacion($informacion){
        $db=new Conexion();
        $adicionar=$db->ExecuteUpdate('call addInformacion(?,?,?,?,?,?,?,?,?,?,?,?)',$informacion);
    }

    public function allInformacion(){
        $db=new Conexion();
        $listamyInformacion = [];
        $select=$db->ExecuteQuery('call allInformacion');

        foreach($select as $informacion){
            $myInformacion = new informacion();
            $myInformacion->nombre=$informacion['nombre'];
            $myInformacion->grupo = $informacion['grupo'];
            $myInformacion->nie = $informacion['nie'];
            $myInformacion->pContaduria = $informacion['pContaduria'];
            $myInformacion->pSalud = $informacion['pSalud'];
            $myInformacion->pTurismo = $informacion['pTurismo'];
            $myInformacion->pInfra = $informacion['pInfra'];
            $myInformacion->pSoftware = $informacion['pSoftware'];
            $myInformacion->pLogistica = $informacion['pLogistica'];
            $myInformacion->pGeneral = $informacion['pGeneral'];
            $myInformacion->pAutoconocimiento = $informacion['pAutoconocimiento'];
            $myInformacion->pRelaciones = $informacion['pRelaciones'];
            $listamyInformacion[] =$myInformacion;
        }
        return $listamyInformacion;
    }
}

?>