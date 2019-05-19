<?php


// require '../DAO/conect.php';
require_once '../DAO/database.php';

require_once '../model/sale_model.php';



	$venda = new sale_model;
	$key = $venda->keygenerate();
	$conn = new DatabaseUtility();
	$conn->connect();


//Verificar se algum campo solicitado está vazio

	$valortotal = 0;
	
if (!empty($_POST['prod1'])&& $_POST['qnt1'] != 0) {
		
	
	$prod1 = $_POST["prod1"];
	
	$qnt1 = $_POST["qnt1"];
		
	$total_prod1 = $conn->calc_sale($prod1,$qnt1);
			
	$valortotal = $total_prod1;
	
		
	
	} 
	
	if (!empty($_POST['prod2'])&& $_POST['qnt2'] != 0) {
		
	
	$prod2 = $_POST["prod2"];
	
	$qnt2 = $_POST["qnt2"];
	
		
	$total_prod2 = $conn->calc_sale($prod2,$qnt2);
	
	$valortotal = $valortotal+$total_prod2;
	
	
	
	} 
    
	if (!empty($_POST['prod3'])&& $_POST['qnt3'] != 0) {
		
	
	$prod3 = $_POST["prod3"];
	
	$qnt3 = $_POST["qnt3"];
	
		
	$total_prod3 = $conn->calc_sale($prod3,$qnt3);
	
	$valortotal = $valortotal+$total_prod3;

	
	
	
	} 
	
	if (!empty($_POST['prod4'])&& $_POST['qnt4'] != 0) {
		
	
	$prod4 = $_POST["prod4"];
	
	$qnt4 = $_POST["qnt4"];
	
		
	// calcular valor de produto 4
	
	$total_prod4 = $conn->calc_sale($prod4,$qnt4);
	
	// somar valor total
	
	
	$valortotal = $valortotal+$total_prod4;
	
		
		
	
	} 
	
	if (!empty($_POST['prod5'])&& $_POST['qnt5'] != 0) {
		
	
	$prod5 = $_POST["prod5"];
	
	$qnt5 = $_POST["qnt5"];
	
		
	//calcular valor de produto 5
	
	$total_prod5 = $conn->calc_sale($prod5,$qnt5);
	
	//somar ao valor total
	
	$valortotal = $valortotal+$total_prod5;
	
	
	
	} 
	
	$user_id = 5;
		
	echo "Valor total R$ ".$valortotal."<br>";	
	
	date_default_timezone_set("America/Bahia");
	$data_atual = date("Y/m/d h:i:s");
	
	
	$conn->encon_insert($key,$user_id,$data_atual,$valortotal);
	
	$conn->encon_prod_insert($key,$prod1,$qnt1,$prod2,$qnt2,$prod3,$qnt3,$prod4,$qnt4,$prod5,$qnt5);	
	
	

	header('location: ../View/user_func.html');	


	
	















