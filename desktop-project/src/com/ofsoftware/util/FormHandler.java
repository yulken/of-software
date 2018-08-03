package com.ofsoftware.util;

import javafx.scene.control.Alert;
import javafx.stage.Window;

public class FormHandler {
	
	public static boolean validarDados(String dado, String campo, Window janela) {
		if(dado.isEmpty()) {
			mostraAlerta(Alert.AlertType.ERROR, janela, "Erro de validação!", 
	                "Por favor, insira seu " + campo + ".");
	        return false;
		}
		return true;
	}
	
	public static void mostraAlerta(Alert.AlertType alertType, Window janela, String title, String message) {
        Alert alert = new Alert(alertType);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.initOwner(janela);
        alert.show();
    }
	
}

