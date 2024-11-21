<?php
/*
   conexao com bd usando PDO : PDO permite acessar 
*/
// Declarar as variaveis com os dados de conexao 
$host = 'localhost'; 
$dbname = 't57_login'; 
$usuario = 'root'; 
$senha = ''; 

 // data source name = nome da origuem dos dados 
 $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

 try{ 
    // cria a conexao 
    $conn = new PDO($dsn,$usuario,$senha);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
 }catch(PDOException $e){
    die("ERRO De Conexão ".$e->getMessage()); 
 }