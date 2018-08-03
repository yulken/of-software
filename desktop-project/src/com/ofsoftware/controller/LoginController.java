package com.ofsoftware.controller;


import com.ofsoftware.application.LoginApplication;
import com.ofsoftware.model.Usuario;
import com.ofsoftware.persistence.DAOUsuario;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.GridPane;
import javafx.stage.Stage;
import javafx.util.Callback;

public class LoginController {
	public static Stage mainStage;
	@FXML
	private AnchorPane anchorPane; 
	@FXML
	private GridPane mainGrid, footerGrid;	
	@FXML
	private TextField txtLogin, txtPass;
	@FXML
	private Label txtWelcome;	
	@FXML
	private Button btnEnvio;
	@FXML
	private void handleButtonAction(ActionEvent event) {    
	}	
	
	@FXML
	public void fazLogin(ActionEvent event) throws Exception{
		DAOUsuario dao = new DAOUsuario();
		//Usuario user = dao.doLogin(txtLogin.getText(), txtPass.getText());
		Usuario user = dao.doLogin("yulken", "123456");
		FXMLLoader fxmlloader = new FXMLLoader(getClass().getClassLoader().getResource("Resources/views/main.fxml"));

		//Instancia a próxima stage com um usuário. +- uma sessão
		fxmlloader.setControllerFactory(new Callback<Class<?>, Object>() {
			@Override
			public Object call(Class<?> param) {
				if (param == MainController.class) {					
					MainController mainController = new MainController();
					mainController.setUsuario(user);
					return mainController;
				} else {
					try {
						return param.newInstance();
					}
					catch (Exception ex) {
						throw new RuntimeException(ex);
					}
				}
			}
		});
		
		Parent loginWindow = fxmlloader.load();		    
	    mainStage = new Stage();
	    Scene scene = new Scene(loginWindow);
	    mainStage.getIcons().add(new Image("Resources/img/homeicon.png"));
		mainStage.setTitle("Root");
		mainStage.setScene(scene);
		mainStage.show();
		
		LoginApplication.parentWindow.close();
	}	

	public void redirecionaInicio(ActionEvent event) throws Exception{
		
		Parent loginWindow = FXMLLoader.load(getClass().getClassLoader().getResource("Resources/views/cadastro.fxml"));
	    Stage mainStage = LoginApplication.parentWindow;	    
	    mainStage.getScene().setRoot(loginWindow);
		
	}
}
