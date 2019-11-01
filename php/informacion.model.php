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
}

?>