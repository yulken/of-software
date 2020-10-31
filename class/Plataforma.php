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

    public static function listarPorJogo($id_jogo){
        $query = "SELECT `plataforma`.`id`, `plataforma`.`nome`
                    FROM `jogo`
                    LEFT JOIN `relaciona_plataforma` ON `jogo`.`id`=`relaciona_plataforma`.`id_jogo`
                    LEFT JOIN `plataforma` ON `relaciona_plataforma`.`id_plataforma`=`plataforma`.`id`
                    WHERE `jogo`.`id` = :id_jogo";

        $conexao = Conexao::getConexao();
        $stmnt = $conexao->prepare($query);
        $stmnt->bindValue(':id_jogo', $id_jogo);
        $stmnt->execute();
        $lista = $stmnt->fetchAll();
        return $lista;
    }

    public static function listar(){
        $plataformas = array();
        $query = "SELECT id, nome  FROM `plataforma` ORDER BY `nome`";
        $conexao = Conexao::getConexao();
        $stmnt = $conexao->prepare($query);
        $stmnt->execute();
        $lista = $stmnt->fetchAll();
        foreach($lista as $linha){
            $plataforma = new Plataforma($linha['id'], $linha['nome']);
            array_push($plataformas,$plataforma);
        }
        return $plataformas;
    }
}
 ?>
