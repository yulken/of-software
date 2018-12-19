<?php
class Plataforma{
    private $id_plataforma;
    private $nome_plataforma;
    
    public function __construct($id, $nome) {		
        $this->id_plataforma = $id;		
        $this->nome_plataforma = $nome;
    }		

// GETTERS N SETTERS
    public function getId(){
        return $this->id_plataforma;
    }
    public function setId($id){
        $this->id_plataforma = $id;
    }
    public function getNome(){
        return $this->nome_plataforma;
    }
    public function setNome($nome){
        $this->nome_plataforma = $nome;
    }

}
 ?>
