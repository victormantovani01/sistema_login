<?php
//codigo para receber as informacoes do HTML e fazer algo 
// captura o que o usuario digitou e cadastrou no bd 

// chama arquivo de conexao
include 'conexao.php';

//verifica se existe alguma informacao chegando pela rede 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //RECEBE O EMAIL, FILTRA E ARMAZENA NA VARIAVEL 
    $email = htmlspecialchars($_POST['email']);

    //recebe a senha, criptografada e armazena em uma variavel 
    $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);

    //exibe a variavel pra testar 
    var_dump($senha);

    // bloco tente para cadastrar no banco de dados
    try{
        // prepara a comando sql para inserir na banco de dados 
        // utilizar o prepared para preverir injetar sql 
        $stmt = $conn->prepare("INSERT INTO Usuarios (email,senha) VALUES (:email, :senha)"); 

        // associa os valores das variaveis email e senha 
        $stmt->bindParam(":email",$email); //vincula o email e limpa 
        $stmt->bindParam(":senha",$senha); 

        //execute o codigo 
        $stmt->execute();

        echo "cadastro com Sucesso";        
    }catch(PDOException $e){
        echo "Erro ao cadastrar o ususario :".$e->getMessage();
    }
}