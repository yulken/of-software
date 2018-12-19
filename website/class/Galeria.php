<?php
    class Galeria{
        private $id_jogo;
        private $nome_pasta = array();
        
        public function getId(){
            return $this->id_jogo;
        }
        public function setId($id){
            $this->id_jogo = $id;
        }
        public function getPaths(){
            return $this->nome_pasta;
        }
        public function setPaths($paths){
            $this->nome_pasta = $paths;
        }
    }
?>