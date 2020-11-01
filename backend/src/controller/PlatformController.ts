import { Request, Response } from "express";
import { Platform } from "../model/Types";
import db from "../database/connection";

export default class PlatformController {
    async index(request: Request, response: Response) {
        try {
            const platforms = await db<Platform>('platform').orderBy('platform.name');
            return response.json(platforms);
        }
        catch (err) {
            console.error(err);
            return response.status(400).json({ error: err })
        }
    }
}
