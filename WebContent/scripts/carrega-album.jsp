<%@page import="java.util.Arrays"%>
<%@ page language="java" contentType="text/html; charset=utf-8" pageEncoding="utf-8"%>
<%@ page import="com.ofsoftware.Conexao"%>
<%@ page import="java.sql.*"%>
<%@ page import="java.util.ArrayList"%>
<%


String selJogos = "SELECT * FROM mostra_jogos group BY nome_jogo";

boolean isFiltroPlataformaAtivo = (request.getParameterValues("filtroP[]") != null) ? true : false;
boolean isFiltroGeneroAtivo = (request.getParameterValues("filtroG[]") != null) ? true : false;
boolean isFiltroAtivo = (isFiltroPlataformaAtivo || isFiltroGeneroAtivo) ? true : false;

if (isFiltroAtivo) {
    //FRAGMENTOS INICIAIS DE QUERIES

    String querySelect = "SELECT * FROM mostra_jogos WHERE";
    ArrayList<String> queryList = new ArrayList<String>();
    queryList.add(querySelect);
    
    ArrayList<String> plataformas = new ArrayList<String>();
    ArrayList<String> generos = new ArrayList<String>();
    int countPlataformas = 0;
    int countGeneros = 0;
    if (isFiltroPlataformaAtivo){
   		plataformas = new ArrayList<String>(Arrays.asList(request.getParameterValues("filtroP[]")));
    	countPlataformas = (isFiltroPlataformaAtivo) ? plataformas.size() : 0;
    }
    if (isFiltroGeneroAtivo){
   		generos = new ArrayList<String>(Arrays.asList(request.getParameterValues("filtroG[]")));
   		countGeneros = (isFiltroGeneroAtivo) ? generos.size() : 0;
    }
    
    int countTotal = countPlataformas + countGeneros;
		int currentCounter = 0;

    //FIM DE FRAGMENTOS INICIAIS DE QUERIES

    //FRAGMENTOS COMPLEMENTARES DO WHERE
    if(isFiltroPlataformaAtivo){
    	plataformas = new ArrayList<String>(Arrays.asList(request.getParameterValues("filtroP[]")));
    	countPlataformas = (isFiltroPlataformaAtivo) ? plataformas.size() : 0;
    	
      if (countPlataformas > 1 && countGeneros > 1){
        for(int i=0; i < countPlataformas; i++){
          String queryWhere = (i==0) ? " (id_plataforma=" + plataformas.get(i) : " OR id_plataforma=" + plataformas.get(i);
          queryList.add(queryWhere);
          currentCounter++;
        }
        queryList.add(")");
      } else{
        for(int i=0; i < countPlataformas; i++){
          String queryWhere = (i==0) ? " id_plataforma=" + plataformas.get(i) : " OR id_plataforma=" + plataformas.get(i);
          queryList.add(queryWhere);
          currentCounter++;
        }
      }
    }
    if(isFiltroGeneroAtivo && isFiltroPlataformaAtivo){
      String queryAndOr = (countPlataformas > 0 && countGeneros > 0) ? " AND" : "";
      queryList.add(queryAndOr);
    }
	    if(isFiltroGeneroAtivo){
	    	generos = new ArrayList<String>(Arrays.asList(request.getParameterValues("filtroG[]")));
	    	countGeneros = (isFiltroGeneroAtivo) ? generos.size() : 0;
	    	if (countPlataformas > 1 && countGeneros > 1){
	    		for (int i=0; i < countGeneros; i++){
	    			String queryWhere = (i==0) ? " (id_genero=" + generos.get(i) : " OR id_genero=" + generos.get(i);
	    			queryList.add(queryWhere);
	    	    currentCounter++;
	    		}
						queryList.add(")");
	    }	else{
	        for(int i=0; i < countGeneros; i++){
	            String queryWhere = (i==0) ? " id_genero=" + generos.get(i) : " OR id_genero=" + generos.get(i);
	            queryList.add(queryWhere);
	            currentCounter++;
	          }
	    	}
	    }
	    
	    //FIM DE FRAGMENTOS COMPLEMENTARES DO WHERE
	    //FRAGMENTOS DA METADE DA QUERY
			String queryGroup =  " GROUP BY nome_jogo";
	    queryList.add(queryGroup);
	    if (countPlataformas>1 || countGeneros>1){
	    	String queryHaving = " HAVING";
	    	queryList.add(queryHaving);
	    }
	    //FIM DE FRAGMENTOS DA METADE DA QUERY
	    
	    //FRAGMENTOS COMPLEMENTARES DO HAVING
	    
	    if (countPlataformas > 1) {
	    	int limiter = countPlataformas - 1;
	    	String queryHavingComplement = " COUNT(DISTINCT nome_plataforma) > " + limiter;
	    	queryList.add(queryHavingComplement);
	    }
		
	    if (countGeneros >1){
	    	int limiter = countGeneros - 1;
	    	String queryHavingComplement = ((countTotal - countGeneros) > 1) ? " AND COUNT(DISTINCT nome_genero) > " + limiter : " COUNT(DISTINCT nome_genero) > " + limiter;
	    	queryList.add(queryHavingComplement);
	    }
	    //FIM DE FRAGMENTOS COMPLEMENTARES DO HAVING
    	//CONCATENACAO DE TODOS OS FRAGMENTOS ADQUIRIDOS
			String queryConcatenada="";
			for (int i=0; i < queryList.size(); i++) {
		        queryConcatenada = queryConcatenada + queryList.get(i);
		  }
		  //FIM DE CONCATENACAO DE TODOS OS FRAGMENTOS ADQUIRIDOS
	    
	    selJogos= queryConcatenada;
    }
//JOGANDO A QUERY FILTRADA NO BANCO E RETORNANDO SEU RESULTADO
Connection conexao = null;
ResultSet queryResult = null;
try{
	Class.forName("com.mysql.jdbc.Driver");

	conexao = DriverManager.getConnection("jdbc:mysql://localhost/root","root","");
	Statement getQuery = conexao.createStatement();
	getQuery.executeQuery(selJogos);

	queryResult = getQuery.getResultSet();
	int countRows = 0;
 	while(queryResult.next()){
		countRows++;
 	}
	queryResult.beforeFirst();
	if (countRows > 0){
	 	while(queryResult.next()){
	 		int idJogo = queryResult.getInt("id_jogo"); 
	 		String nomeJogo= queryResult.getString("nome_jogo");
	 		String destinoFoto = queryResult.getString("destino_capa");
	 		out.println("<div class='col-md-5 mx-4 bg-white mb-5 p-3 box-shadow mx-auto cartao'><a href='./produto.jsp?id=" + idJogo  + "'><img class='mt-1 card-img-top img-cover-custom' src='img/capas/" + destinoFoto + "' alt='Capa de "+ nomeJogo + "'></a> <div class='cartao-corpo bg-main-lighter'><h4 class='text-center'>" + nomeJogo + "</h4></div> <div class='mini-cartao-corpo bg-main-lighter'><h4 class='text-center'>" + nomeJogo + "</h4></div></div>"); 
	 	}
	} else{
		out.println("<div class='mx-auto text-center'><h1 class='font-italic'>\"Ai! Nada aconteceu... ¯\\_(ツ)_/¯\"</h2><h3 class='pt-4'>Embora tenhamos uma vasta coleção de jogos, a sua escolha de filtros não retornou nada. <br /> Um dia iremos resolver esse problema! ;)'</h3></div>");
	}
	conexao.close();
}
catch(Exception e){
 	out.println("Erro na consulta!");
 	out.println(e);
}

%>