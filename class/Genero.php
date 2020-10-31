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
    
    public static function listarPorJogo($id_jogo){
        $query = "SELECT `genero`.`id`, `genero`.`nome`
                    FROM `jogo`
                    LEFT JOIN `relaciona_genero` ON `jogo`.`id`=`relaciona_genero`.`id_jogo`
                    LEFT JOIN `genero` ON `relaciona_genero`.`id_genero`=`genero`.`id`
                    WHERE `jogo`.`id`= :id_jogo";

        $conexao = Conexao::getConexao();
        $stmnt = $conexao->prepare($query);
        $stmnt->bindValue(':id_jogo', $id_jogo);
        $stmnt->execute();
        $lista = $stmnt->fetchAll();
        return $lista;
    }

    public static function listar(){
        $generos = array();
        $query = "SELECT id, nome  FROM `genero` ORDER BY `nome`";
        $conexao = Conexao::getConexao();
        $stmnt = $conexao->prepare($query);
        $stmnt->execute();
        $lista = $stmnt->fetchAll();
        foreach($lista as $linha){
            $genero = new Genero($linha['id'], $linha['nome']);
            array_push($generos,$genero);
        }
        return $generos;
    }
}
 ?>
