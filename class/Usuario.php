<?php

class Usuario {

    private $id_usuario;
    private $deslogin;
    private $dessenha;
    private $dt_cadastro;

    public function getId_usuario(){
        return $this->id_usuario;
    }

    public function setId_usuario($value){
        $this->id_usuario = $value;
    }

    public function getDeslogin(){
        return $this->deslogin;
    }

    public function setDeslogin($value){
        $this->deslogin = $value;
    }

    public function getDessenha(){
        return $this->dessenha;
    }

    public function setDessenha($value){
        $this->dessenha = $value;
    }

    public function getDt_cadastro(){
        return $this->dt_cadastro;
    }

    public function setDt_cadastro($value){
        $this->dt_cadastro = $value;
    }

    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios 
                                         WHERE id_usuario = :ID", array(":ID"=>$id));

        if (count($results) > 0){

            $row = $results[0];

            $this->setId_usuario ($row['id_usuario']);
            $this->setDeslogin   ($row['deslogin']);
            $this->setDessenha   ($row['dessenha']);
            $this->setDt_cadastro(new Datetime($row['dt_cadastro']));
        }

    }

    public static function getList(){
        
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }

    public static function search($login){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin 
                                      LIKE :SEARCH ORDER BY deslogin",
                                      array(':SEARCH'=>"%".$login."%"
                                      ));
    }

    public function login($login, $password){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios 
                                          WHERE deslogin = :LOGIN 
                                            AND dessenha = :PASSWORD",
                                          array(":LOGIN"=>$login,
                                                ":PASSWORD"=>$password
                                                ));

        if (count($results) > 0){

            $row = $results[0];

            $this->setId_usuario ($row['id_usuario']);
            $this->setDeslogin   ($row['deslogin']);
            $this->setDessenha   ($row['dessenha']);
            $this->setDt_cadastro(new Datetime($row['dt_cadastro']));
        } else {

            throw new Exception("Login/Senha inválidos");

        }

    }

    public function __toString()
    {
        return json_encode(array(
            "id_usuario" =>$this->getId_usuario(),
            "deslogin"  =>$this->getDeslogin(),
            "dessenha"  =>$this->getDessenha(),
            "dt_cadastro"=>$this->getDt_cadastro()->format("d/m/Y H:i:s")
        ));
    }


}