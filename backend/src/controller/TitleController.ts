import { Request, Response } from "express";
import Title from "../model/Title";
import db from "../database/connection";

export default class TitleController {
    async findAllTitles(request: Request, response: Response) {
        try {
            const titles = await db('jogo');
            return response.json({ titles });
        }
        catch (err) {
            console.error(err);
            return response.status(400).json({ error: err })
        }
    }

    async findTitleById(request: Request, response: Response) {
        const { id } = request.params;
        console.log(id);
        try{
            const title = await db('jogo').where('jogo.id','=',id)
            return response.json({title});
        }
        catch(err){
            console.error(err);
            return response.status(400).json({error: err})
        }
    }

    async getScreenshotsByTitleId(request: Request, response: Response) {
        const { id } = request.params;
        try{
            const screenshots = await db('galeria_jogos')
                .select('caminho')
                .where('galeria_jogos.id_jogo','=',id)
            return response.json(screenshots);
        }
        catch(err){
            console.error(err);
            return response.status(400).json({error: err})
        }
    }
}

// public function carregaPlataformas(){
//     $lista= Plataforma::listarPorJogo($this->id);
//     foreach($lista  as $linha){
//         $plataforma = new Plataforma($linha['id'], $linha['nome']);
//         array_push($this->plataformas, $plataforma);
//     }
// }
// public function carregaGeneros(){
//     $lista= Genero::listarPorJogo($this->id);
//     foreach($lista  as $linha){
//         $genero = new Genero($linha['id'], $linha['nome']);
//         array_push($this->generos, $genero);
//     }
// }
// public function listaGaleria(){
//     $query = "SELECT * FROM `galeria_jogos` WHERE `id_jogo` = :id";

//     $conexao = Conexao::getConexao();
//     $stmnt = $conexao->prepare($query);
//     $stmnt->bindValue(':id', $this->id);

//     $stmnt->execute();
//     $lista = $stmnt->fetchAll();
//     return $lista;

// }