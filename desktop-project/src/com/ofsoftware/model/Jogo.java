package com.ofsoftware.model;

import java.util.ArrayList;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

import com.ofsoftware.persistence.DAOJogo;

import javafx.geometry.VPos;
import javafx.scene.control.Label;
import javafx.scene.layout.Pane;
import javafx.scene.layout.Priority;
import javafx.scene.layout.RowConstraints;

@Entity
public class Jogo {
	
	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private int id;
	private String nome;
	private String descricao;
	private String capaDestino;
	private double preco;
	private double desconto;
	
	public Jogo() {
		super();
	}
	public Jogo(int id, String nome, String descricao, String capaDestino, double preco, double desconto) {
		super();
		this.id = id;
		this.nome = nome;
		this.descricao = descricao;
		this.capaDestino = capaDestino;
		this.preco = preco;
		this.desconto = desconto;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public String getNome() {
		return nome;
	}
	public void setNome(String nome) {
		this.nome = nome;
	}
	public String getDescricao() {
		return descricao;
	}
	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}
	public String getCapaDestino() {
		return capaDestino;
	}
	public void setCapaDestino(String capaDestino) {
		this.capaDestino = capaDestino;
	}
	public double getPreco() {
		return preco;
	}
	public void setPreco(double preco) {
		this.preco = preco;
	}
	public double getDesconto() {
		return desconto;
	}
	public void setDesconto(double desconto) {
		this.desconto = desconto;
	}
	
	public static ArrayList<Jogo> listarJogos(){
		DAOJogo dao = new DAOJogo();
		ArrayList<Jogo> jogos = (ArrayList<Jogo>) dao.lista();
		dao.close();
		return jogos;
	}
}
