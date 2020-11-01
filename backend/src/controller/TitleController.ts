import { Request, Response } from "express";
import { Title, Screenshot, Platform, Genre } from "../model/Types";
import db from "../database/connection";

export default class TitleController {
    async index(request: Request, response: Response) {
        try {
            const titles = await db<Title>('title');
            return response.json({ titles });
        }
        catch (err) {
            console.error(err);
            return response.status(400).json({ error: err })
        }
    }

    async findById(request: Request, response: Response) {
        const { id } = request.params;
        console.log(id);
        try {
            const title = await db<Title>('title').where('title.id', '=', id)
            return response.json(title[0]);
        }
        catch (err) {
            console.error(err);
            return response.status(400).json({ error: err })
        }
    }

    async getScreenshotsByTitleId(request: Request, response: Response) {
        const { id } = request.params;
        try {
            const screenshots = await db<Screenshot>('screenshot')
                .where('screenshot.title_id', '=', id)
            return response.json(screenshots);
        }
        catch (err) {
            console.error(err);
            return response.status(400).json({ error: err })
        }
    }

    async getPlatformsById(request: Request, response: Response) {
        const { id } = request.params;
        console.log(id);
        try {
            const platforms = await db<Platform>('platform')
                .select('platform.id', 'platform.name')
                .leftJoin('rl_platform', 'rl_platform.platform_id', 'platform.id')
                .leftJoin('title', 'rl_platform.title_id', 'title.id')
                .where('title.id', id);
            return response.json(platforms);
        }
        catch (err) {
            console.error(err);
            return response.status(400).json({ error: err })
        }
    }

    async getGenresById(request: Request, response: Response) {
        const { id } = request.params;
        console.log(id);
        try {
            const genres = await db<Genre>('genre')
                .select('genre.id', 'genre.name')
                .leftJoin('rl_genre', 'rl_genre.genre_id', 'genre.id')
                .leftJoin('title', 'rl_genre.title_id', 'title.id')
                .where('title.id', id);
            return response.json(genres);
        }
        catch (err) {
            console.error(err);
            return response.status(400).json({ error: err })
        }
    }
}