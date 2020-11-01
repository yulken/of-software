import express from "express";

import TitleController from "./controller/TitleController";
import PlatformController from "./controller/PlatformController";
import GenreController from "./controller/GenreController";


const routes = express.Router();

const titleController = new TitleController();
const platformController = new PlatformController();
const genreController = new GenreController();


routes.get('/titles', titleController.index);

routes.get('/titles/:id', titleController.findById);
routes.get('/titles/:id/platforms', titleController.getPlatformsById);
routes.get('/titles/:id/genres', titleController.getGenresById);

routes.get('/screenshots/:id', titleController.getScreenshotsByTitleId);

routes.get('/platforms/', platformController.index);
routes.get('/genres/', genreController.index);


export default routes;