package com.ofsoftware;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Conexao {
	public static void main(String[] args) throws SQLException {
		try {
			Class.forName("com.mysql.jdbc.Driver");
			Connection conexao = DriverManager.getConnection("jdbc:mysql://localhost/root","root","");
			System.out.println("Conectado!");
			conexao.close();
		}
		catch(ClassNotFoundException e) {
			e.printStackTrace();
		}
	}
}
