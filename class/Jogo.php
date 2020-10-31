<?php
class Jogo{
    private $id;
    private $nome_jogo;
    private $descricao;
    private $foto;
    private $galeria;
    private $plataformas = array();
    private $generos = array();

// GETTERS N SETTERS
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
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
    public function getGaleria()
    {   
        return $this->galeria;
    }
    public function getPlataformas()
    {   
        return $this->plataformas;
    }
    public function getGeneros()
    {   
        return $this->generos;
    }
    public function __construct($id = false)
    {
        if ($id){
            $this->id = $id;
            $this->carrega();
        }
    }
    public function carrega()
    {
        $query = "SELECT `nome`, `descricao`, `foto` FROM `jogo` WHERE `id` = :id";
        $conexao = Conexao::getConexao();
        $stmnt = $conexao->prepare($query);
        $stmnt->bindValue(':id', $this->id);
        $stmnt->execute();
        $linha = $stmnt->fetch();
        $this->nome_jogo = $linha['nome'];
        $this->descricao = $linha['descricao'];
        $this->foto = $linha['foto'];
    }
    public function carregaGaleria()
    {
        $lista = Galeria::listarPorJogo($this->id);
        $galeria = new Galeria($this->id, $lista);
        $this->galeria = $galeria;
    }
    public function carregaPlataformas(){
        $lista= Plataforma::listarPorJogo($this->id);
        foreach($lista  as $linha){
            $plataforma = new Plataforma($linha['id'], $linha['nome']);
            array_push($this->plataformas, $plataforma);
        }
    }
    public function carregaGeneros(){
        $lista= Genero::listarPorJogo($this->id);
        foreach($lista  as $linha){
            $genero = new Genero($linha['id'], $linha['nome']);
            array_push($this->generos, $genero);
        }
    }
    public function listaGaleria(){
        $query = "SELECT * FROM `galeria_jogos` WHERE `id_jogo` = :id";
        
        $conexao = Conexao::getConexao();
        $stmnt = $conexao->prepare($query);
        $stmnt->bindValue(':id', $this->id);

        $stmnt->execute();
        $lista = $stmnt->fetchAll();
        return $lista;
    
    }
}
?>
