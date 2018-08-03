package com.ofsoftware.persistence;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

public abstract class DAO {
	
	protected EntityManager entityManager;
    public DAO() {
        entityManager = getEntityManager();
    }

	protected EntityManager getEntityManager() {
		EntityManagerFactory factory = 
				Persistence.createEntityManagerFactory("persistencia");
        if (entityManager == null) {
            entityManager = factory.createEntityManager();
        }
        return entityManager;
	}
	
	public void close(){
		entityManager.close();
	}

}
