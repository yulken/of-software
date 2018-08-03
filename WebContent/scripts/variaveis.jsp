<%@page language="java" contentType="text/html; charset=utf-8" pageEncoding="utf-8"%>
<%@page import="com.ofsoftware.Conexao"%>
<%@page import="java.sql.*"%>
<%@page import="java.util.HashMap"%>
<%@page import="java.util.Map"%>
<%@page import="com.google.gson.GsonBuilder"%>
<%@page import="com.google.gson.Gson"%>

<%
ResultSet maxPlatQuery = null, maxGenQuery = null;
int maxIdG = 0, maxIdP = 0;
try{
  Connection conexao = DriverManager.getConnection("jdbc:mysql://localhost/root","root","");

  Statement getMaxPlat = conexao.createStatement();
  getMaxPlat.executeQuery("SELECT MAX(id) FROM plataforma");
  maxPlatQuery = getMaxPlat.getResultSet();

  Statement getMaxGen = conexao.createStatement();
  getMaxGen.executeQuery("SELECT MAX(id) FROM genero");
  maxGenQuery = getMaxGen.getResultSet();

  maxPlatQuery.next();
  maxIdP = maxPlatQuery.getInt("MAX(id)");

  maxGenQuery.next();
  maxIdG = maxGenQuery.getInt("MAX(id)");

}

catch (Exception e){
  out.println("Erro na consulta!");
  out.println(e);
}

Map<String, Integer> map = new HashMap<String, Integer>();
map.put("MaxPlat", maxIdP);
map.put("MaxGen", maxIdG);
Gson gson = new GsonBuilder()
.create();

String json = gson.toJson(map);
out.println(json);

%>
