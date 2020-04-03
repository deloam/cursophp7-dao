<?php

class Sql extends PDO {
    //variavel que faz a conexão com o banco de dados
    private $conn;

    //metodo construtor para realizar a conexão com o banco de dados
    public function __construct(){
        $this->conn = new PDO("mysql:host=127.0.0.1;dbname=dbphp7","root","@123Deloam");
    }//__construct

    //metodo para setar parametros para a query do sql
    private function setParams($statement, $parameters = array()){
        foreach ($parameters as $key => $value) {
            $this->setParam($statement, $key, $value);
        }
    }//setParams

    //metodo para setar um parametro apenas no bindparam da query
    private function setParam($statement, $key, $value){
        $statement->bindParam($key, $value);
    }//setParam

    //metodo para passar a query bruta e seus paramentros atraves de um array 
    public function query($rawQuery, $params = array()){
        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }//quert

    //metodo para realizar um select no banco de dados passando uma query bruta
    public function select($rawQuery, $params = array()){
        $stmt = $this->query($rawQuery,$params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }//select

}

?>