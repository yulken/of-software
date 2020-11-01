import { Request, Response } from "express";
import { Genre } from "../model/Types";
import db from "../database/connection";

export default class GenreController {
    async index(request: Request, response: Response) {
        try {
            const genres = await db<Genre>('genre').orderBy('genre.name');
            return response.json(genres);
        }
        catch (err) {
            console.error(err);
            return response.status(400).json({ error: err })
        }
    }
}
