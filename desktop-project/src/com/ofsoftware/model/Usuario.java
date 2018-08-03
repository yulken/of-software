package com.ofsoftware.model;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

@Entity
public class Usuario {

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private int id;
	private String nome;
	private String username;
	private String senha;
	private String email;
	
	public Usuario() {
		super();
	}

	public Usuario(String name, String username, String password, String email) {
		super();
		this.nome = name;
		this.username = username;
		this.senha = password;
		this.email = email;

	}
	
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public String getName() {
		return nome;
	}
	public void setName(String name) {
		this.nome = name;
	}
	public String getUsername() {
		return username;
	}

	public void setUsername(String username) {
		this.username = username;
	}

	public String getSenha() {
		return senha;
	}

	public void setSenha(String senha) {
		this.senha = senha;
	}

	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
	}
	
	@Override
	public String toString(){
		String text = "Nome: " + nome + "\n";
		text += "Username: " + username + "\n";
		text += "Senha: " + senha + "\n";
		text += "Email: " + email + "\n";
		System.out.println(text);
		return text;
	}
}
