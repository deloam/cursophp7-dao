<?php

class Usuario {
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario()
    {
        return $this->idusuario;
    }//getIdusuario
    public function setIdusuario($value)
    {
        $this->idusuario = $value;
    }//setIdusuario

    public function getDeslogin()
    {
        return $this->deslogin;
    }//getDeslogin
    public function setDeslogin($value)
    {
        $this->deslogin = $value;
    }//setDeslogin

    public function getDessenha()
    {
        return $this->dessenha;
    }//getDessenha
    public function setDessenha($value)
    {
        $this->dessenha = $value;
    }//setDessenha

    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }//getDtcadastro
    public function setDtcadastro($value)
    {
        $this->dtcadastro = $value;
    }//setDtcadastro

    //metodo para exibir dados da tabela usando o id ($id) como referência
    public function loadById($id)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        if(count($results) > 0) {
            $row = $results[0];

            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
        }//if
    }//loadById

    public function __toString()
    {
        return json_encode(array(
            'idusuario'=>$this->getIdusuario(),
            'deslogin'=>$this->getDeslogin(),
            'dessenha'=>$this->getDessenha(),
            'dtcadastro'=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));
    }//__toString
}// Class ususario

?>