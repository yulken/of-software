import express from "express";

import TitleController from "./controller/TitleController";
import PlatformController from "./controller/PlatformController";


const routes = express.Router();

const titleController = new TitleController();
const platformController = new PlatformController();


routes.get('/titles', titleController.index);

routes.get('/titles/:id', titleController.findById);
routes.get('/titles/:id/platforms', titleController.getPlatformsById);
routes.get('/titles/:id/genres', titleController.getGenresById);

routes.get('/screenshots/:id', titleController.getScreenshotsByTitleId);

routes.get('/platforms/', platformController.index);


export default routes;