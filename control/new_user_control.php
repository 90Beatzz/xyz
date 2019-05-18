<?php

require_once '../model/user_model.php';
// require '../DAO/conect.php';
require_once '../DAO/database.php';



//Verificar se algum campo solicitado está vazio

if (!empty($_POST["nome"])&& !empty($_POST["cpf"]) && !empty($_POST["cep"])
 && !empty($_POST["rg"]) && !empty($_POST["login"]) && !empty($_POST["senha"])) {
    
    // se todos os campo preenchidos (exceção "mod") salvar em variaveis
    
    $mod = $_POST["mod"];
    $nome = ($_POST["nome"]);
    $cpf = ($_POST["cpf"]);
    $cep = ($_POST["cep"]);
    $rg = ($_POST["rg"]);
    $login = ($_POST["login"]);
    $senha = ($_POST["senha"]);
	$h = ($_POST["setor"]);
	
    
    $login_pass = md5($login);
    $senha_pass = md5($senha);
    

    $este = new user_model($nome, $cpf, $rg, $cep, $login_pass, $senha_pass,$mod,$h); 
    

    
    $conn = new DatabaseUtility();
    $conn->connect();
    $a = $este->GetNome();
    $b = $este->GetCpf();
    var_dump($b);
    $c = $este->GetRg();
    $d = $este->GetCep();
    $e = $este->GetLogin();
    $f = $este->GetSenha();
    $g = $este->GetMod();  
	$h = $este->GetSetor();	
  
    $conn->new_user_insert($a, $b, $c, $d, $e, $f, $g, $h);

    header("Location: ../View/user_func.html"); 

} else {
        header("Location: ../View/register.html");   
    
}














