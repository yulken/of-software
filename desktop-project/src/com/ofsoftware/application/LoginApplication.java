package com.ofsoftware.application;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.image.Image;
import javafx.stage.Stage;

public class LoginApplication extends Application{
	public static Stage parentWindow;
	
	public void start(Stage primaryStage) throws Exception{
		parentWindow = primaryStage;
		Parent root = FXMLLoader.load(getClass().getClassLoader().getResource("Resources/views/login.fxml"));
		Scene scene = new Scene(root);
		primaryStage.getIcons().add(new Image("Resources/img/homeicon.png"));
		primaryStage.setTitle("Root");
		primaryStage.setResizable(false);
		primaryStage.setScene(scene);
		primaryStage.show();
		
	}
	@Override
	public void stop() {
	  	System.exit(0);
	}

	public static void main(String[] args) {
		launch(args);
	}
	
	

}