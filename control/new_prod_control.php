<?php

require_once '../model/prod_model.php';
// require '../DAO/conect.php';
require_once '../DAO/database.php';



//Verificar se algum campo solicitado está vazio

if (!empty($_POST["nome"])&& !empty($_POST["qnt"]) && !empty($_POST["mrc"])
 && !empty($_POST["ctg"])){
    
    // se todos os campo preenchidos (exceção "mod") salvar em variaveis
    
    $nome = $_POST["nome"];
    $qnt = ($_POST["qnt"]);
    $mrc = ($_POST["mrc"]);
    $ctg = ($_POST["ctg"]);
	$val = ($_POST["val"]);

	
    $este = new prod_model($nome, $qnt, $mrc, $ctg,$val); 
    

    
    $conn = new DatabaseUtility();
    $conn->connect();
	
	
	
    $a = $este->GetNome();
    $b = $este->GetQuantidade();
    $c = $este->GetMarca();
    $d = $este->GetCategoria();
	$e = $este->GetValor();
    
  
    $conn->new_prod_insert($a, $b, $c, $d, $e);

    header("Location: ../View/user_func.html"); 

} else {
        echo "Não foi possivel cadastrar produto";
    
}














