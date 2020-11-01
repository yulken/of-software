import express from "express";
import TitleController from "./controller/TitleController";



const routes = express.Router();

const titleController = new TitleController();

routes.get('/titles', titleController.findAllTitles);
routes.get('/titles/:id', titleController.findTitleById);
routes.get('/screenshots/:id', titleController.getScreenshotsByTitleId);


export default routes;