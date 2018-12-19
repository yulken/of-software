<?php
class Jogo{
    private $id_jogo;
    private $nome_jogo;
    private $descricao;
    private $foto;

// GETTERS N SETTERS
    public function getId(){
        return $this->id_jogo;
    }
    public function setId($id){
        $this->id_jogo = $id;
    }
    public function getNome(){
        return $this->nome_jogo;
    }
    public function setNome($nome){
        $this->nome_jogo = $nome;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($foto){
        $this->foto = $foto;
    }

}
 ?>
