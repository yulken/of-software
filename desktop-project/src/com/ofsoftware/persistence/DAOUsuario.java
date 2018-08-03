package com.ofsoftware.persistence;

import java.util.List;

import javax.persistence.Query;

import com.ofsoftware.model.Usuario;

public class DAOUsuario extends DAO {
	
	public void cadastrar(Usuario usuario) {
		entityManager.getTransaction().begin();
		entityManager.persist(usuario);
		entityManager.getTransaction().commit();
		entityManager.close();
	}
	
	public void atualizar(Usuario usuario) {
		entityManager.getTransaction().begin();
		entityManager.merge(usuario);
		entityManager.getTransaction().commit();
		entityManager.close();
	}
	
	public List<Usuario> lista() {
		Query query = entityManager.createQuery("from Usuario c");
		List<Usuario> lista = query.getResultList();
		return (List<Usuario>)lista;
	}
	
	public Usuario getById(Integer id) {
		return entityManager.find(Usuario.class, id);
	}
	
	
	public Usuario doLogin(String username, String senha){
		Query query = entityManager.createQuery("Select c from Usuario c where username='" + username + "'");
		try {  
			Usuario user = (Usuario) query.getResultList().get(0);
			if (user.getSenha().equals(senha)) {
				return user;
			}
		}
		catch(Exception e){
			System.out.println(e);
			return null;
		}
		
		System.out.println("Errou");
		return null;
	}
	
	
	public void remove(Usuario usuario) {
		try {
			entityManager.getTransaction().begin();
			usuario = entityManager.find(
					Usuario.class,usuario.getId());
			entityManager.remove(usuario);
			entityManager.getTransaction().commit();
		} catch (Exception ex) {
			ex.printStackTrace();
			entityManager.getTransaction().rollback();
		}
	}
	
	public void removeById(Integer id) {
		try {
			Usuario usuario = getById(id);
				remove(usuario);
		} catch (Exception ex) {
			ex.printStackTrace();
		}
	}
	
}
