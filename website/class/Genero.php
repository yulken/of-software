<?php
class Genero{
    private $id_genero;
    private $nome_genero;

    public function __construct($id, $nome){
        $this->id_genero = $id;
        $this->nome_genero = $nome;
    }
// GETTERS N SETTERS
    public function getId(){
        return $this->id_genero;
    }
    public function setId($id){
        $this->id_genero = $id;
    }
    public function getNome(){
        return $this->nome_genero;
    }
    public function setNome($nome){
        $this->nome_genero = $nome;
    }

}
 ?>
