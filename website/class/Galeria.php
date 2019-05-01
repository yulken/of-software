<?php
    class Galeria{
        private $id;
        private $nome_pasta = array();
        
        public function getId(){
            return $this->id;
        }
        public function getPaths(){
            return $this->nome_pasta;
        }
        public function __construct($id, $paths){
            $this->id = $id;
            foreach($paths as $linha){
                array_push($this->nome_pasta, $linha['caminho']);
            }
        }
        public static function listarPorJogo($id){
            $query = "SELECT caminho FROM `galeria_jogos` WHERE `id_jogo` = :id";
            $conexao = Conexao::getConexao();
            $stmnt = $conexao->prepare($query);
            $stmnt->bindValue(':id', $id);
            $stmnt->execute();
            $lista = $stmnt->fetchAll();
            return $lista;
        
        }
    }
?>