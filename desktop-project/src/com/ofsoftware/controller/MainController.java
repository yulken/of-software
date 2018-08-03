package com.ofsoftware.controller;


import java.util.ArrayList;

import com.ofsoftware.model.Jogo;
import com.ofsoftware.model.Usuario;
import com.ofsoftware.persistence.DAOJogo;

import javafx.application.Platform;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.geometry.VPos;
import javafx.scene.control.Control;
import javafx.scene.control.Label;
import javafx.scene.control.MenuItem;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.Pane;
import javafx.scene.layout.Priority;
import javafx.scene.layout.RowConstraints;

public class MainController{
	@FXML
	private Label txtWelcome,lblTitulo;
	@FXML
	private GridPane gridLista;
	@FXML
	private Pane paneTitulo;
	@FXML
	private MenuItem itemClose;
	
	private Usuario loggedUser;

	@FXML
	public void initialize() {
		String a = this.getUsuario().getName();
		this.txtWelcome.setText("Seja bem-vindo, " + a + "!");
		getLibrary();
		itemClose.addEventHandler(MouseEvent.MOUSE_CLICKED,exitPlatform());	

	}


	public void getLibrary() {
		ArrayList<Jogo> jogos = Jogo.listarJogos();
		for (int i = 0; i < jogos.size(); i++) {
			
			lblTitulo = new Label(jogos.get(i).getNome());
			lblTitulo.getStyleClass().add("games-list");
			lblTitulo.setPrefSize(150, 20);
			//lblTitulo.setTextOverrun(OverrunStyle.CLIP);
			
			paneTitulo = new Pane();
			paneTitulo.getChildren().add(lblTitulo);
			paneTitulo.getStyleClass().add("pane");
			
			/////// HERE //////////////
			paneTitulo.setId("jogo-" + jogos.get(i).getId());
			paneTitulo.addEventHandler(MouseEvent.MOUSE_CLICKED,showCover());
			
			gridLista.addRow(i+1, paneTitulo);
			RowConstraints linhaTitulo = new RowConstraints(40,40,40,Priority.SOMETIMES, VPos.CENTER, false);
			gridLista.getRowConstraints().add(linhaTitulo);


			
			double w=lblTitulo.getWidth();
			System.out.println(w);
			
		}
	}
	
	public void setUsuario(Usuario user) {
		this.loggedUser = user;
	}
	public Usuario getUsuario() {
		return this.loggedUser;
	}
	
	public EventHandler<MouseEvent> exitPlatform() { 
			EventHandler<MouseEvent> close = new EventHandler<MouseEvent>() {        	
				@Override 
	        	public void handle(MouseEvent e) {
	        		Platform.exit();
	        	}
			                
			};
			return close;
	}
	
	public EventHandler<MouseEvent> showCover() { 
		EventHandler<MouseEvent> show = new EventHandler<MouseEvent>() {        	
			@Override 
        	public void handle(MouseEvent e) {
				DAOJogo dao = new DAOJogo();
        		String elementId = ((Pane)e.getSource()).getId();
        		int gameId = Integer.parseInt(elementId.substring(5));
        		dao.getCovers(gameId);
        	}
		                
		};
		return show;
}
}
