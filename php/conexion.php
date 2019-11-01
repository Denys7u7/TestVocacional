<?php 
class conexion{
    
    private $conn;
    function __construct(){
        $host="localhost";
        $dbname="testvocacional";
        $usuario="root";
        $contra="";
        try{
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname",$usuario,$contra);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Muestra Exepciones
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }catch(Exception $e){
            print ("¡Error!" . $e->getMessage());
            die();
        }
    }  
    function Reconnect(){
        try{
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname",$usuario,$contra);
        }catch(Exception $e){
            print ("¡Error!" . $e->getMessage());
            die();
        }
    }
    function ExecuteQuery($Query,$params = []){
        try{
            $gsent = $this->conn->prepare($Query); 
            $gsent->execute(array_values($params));
            return $gsent->fetchAll();
        }catch(Exception $e){
            return "¡Error!" . $e->getMessage();
            die();
        }
    }
    function ExecuteUpdate($Query,$params = []){
        try{
            $gsent = $this->conn->prepare($Query);
            return $gsent->execute(array_values($params));
        }catch(Exception $e){
            return "¡Error! " . $e->getMessage();
            die();
        }
    }
}
?>