package com.ofsoftware.persistence;

import java.util.List;

import javax.persistence.Query;

import com.ofsoftware.model.Jogo;

public class DAOJogo extends DAO {
	
	public void cadastrar(Jogo jogo) {
		entityManager.getTransaction().begin();
		entityManager.persist(jogo);
		entityManager.getTransaction().commit();
		entityManager.close();
	}
	
	public void atualizar(Jogo jogo) {
		entityManager.getTransaction().begin();
		entityManager.merge(jogo);
		entityManager.getTransaction().commit();
		entityManager.close();
	}
	
	public List<Jogo> lista() {
		Query query = entityManager.createQuery("from Jogo c");
		List<Jogo> lista = query.getResultList();
		return (List<Jogo>)lista;
	}
	
	public String getCovers(Integer id){
		Query query = entityManager.createQuery("Select 'capa_destino' from Jogo c where id='" + id + "'");
		String capa = (String) query.getResultList().get(0);
		return capa;
	}
	
	public Jogo getById(Integer id) {
		return entityManager.find(Jogo.class, id);
	}
	
	public void remove(Jogo jogo) {
		try {
			entityManager.getTransaction().begin();
			jogo = entityManager.find(
					Jogo.class,jogo.getId());
			entityManager.remove(jogo);
			entityManager.getTransaction().commit();
		} catch (Exception ex) {
			ex.printStackTrace();
			entityManager.getTransaction().rollback();
		}
	}

	public void removeById(Integer id) {
		try {
			Jogo jogo = getById(id);
				remove(jogo);
		} catch (Exception ex) {
			ex.printStackTrace();
		}
	}
	
}
