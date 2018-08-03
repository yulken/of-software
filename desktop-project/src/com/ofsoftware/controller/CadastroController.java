package com.ofsoftware.controller;

import com.ofsoftware.model.Usuario;
import com.ofsoftware.persistence.DAOUsuario;
import com.ofsoftware.util.FormHandler;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.stage.Stage;
import javafx.stage.Window;

public class CadastroController {

	@FXML
	private TextField txtNome;
	@FXML
	private TextField txtLogin;
	@FXML
	private TextField txtSenha;
	@FXML
	private TextField txtEmail;
	@FXML
	private Button btnEnvio;
	
	@FXML
	private void handleButtonAction(ActionEvent event) {        
	}	
	@FXML
	public void enviarDados(ActionEvent event) {
		Window janela = btnEnvio.getScene().getWindow();
		
		if (!FormHandler.validarDados(txtNome.getText(), "nome", janela)) return;
		if (!FormHandler.validarDados(txtLogin.getText(), "login", janela)) return;
		if (!FormHandler.validarDados(txtSenha.getText(), "senha", janela)) return;
		if (!FormHandler.validarDados(txtEmail.getText(), "email", janela)) return;
		
		Usuario u = new Usuario(txtNome.getText(), txtLogin.getText(), txtSenha.getText(), txtEmail.getText());
		new DAOUsuario().cadastrar(u);
		
		FormHandler.mostraAlerta(Alert.AlertType.CONFIRMATION, janela, "Registrado com sucesso!", 
                "Você foi cadastrado com sucesso, " + txtNome.getText());
	}
	@FXML
	public void redirecionaLogin(ActionEvent event) throws Exception{
		
		Parent loginWindow = FXMLLoader.load(getClass().getClassLoader().getResource("Resources/views/login.fxml"));
		loginWindow.layout();
	    //Stage mainStage = LoginApplication.parentWindow;
	    //mainStage.getScene().setRoot(loginWindow);
	    
	    Stage primaryStage = new Stage();
	    Scene scene = new Scene(loginWindow);
		primaryStage.getIcons().add(new Image("Resources/homeicon.png"));
		primaryStage.setTitle("Root");
		primaryStage.setResizable(false);
		primaryStage.setScene(scene);
		primaryStage.show();
		
	}
	
	//métodos criados para organizar o codigo
	
}