<?php


// require '../DAO/conect.php';
require_once '../DAO/database.php';



//Verificar se algum campo solicitado está vazio



if (!empty($_POST['prod1'])&& $_POST['qnt1'] != 0) {
		
	
	$prod = $_POST["prod1"];
	
	$qnt = $_POST["qnt1"];
	
	$conn = new DatabaseUtility();
	
    $conn->connect();
	
	$prod1 = $conn->calc_sale($prod,$qnt);
	
	echo $prod1."<br>";
	
	
	} 
	
	if (!empty($_POST['prod2'])&& $_POST['qnt2'] != 0) {
		
	
	$prod = $_POST["prod2"];
	
	$qnt = $_POST["qnt2"];
	
	$conn = new DatabaseUtility();
	
    $conn->connect();
	
	$prod2 = $conn->calc_sale($prod,$qnt);
	
	echo $prod2."<br>";
	
	
	} 
    
	if (!empty($_POST['prod3'])&& $_POST['qnt3'] != 0) {
		
	
	$prod = $_POST["prod3"];
	
	$qnt = $_POST["qnt3"];
	
	$conn = new DatabaseUtility();
	
    $conn->connect();
	
	$prod3 = $conn->calc_sale($prod,$qnt);
	
	echo $prod3."<br>";
	
	
	} 
	
	if (!empty($_POST['prod4'])&& $_POST['qnt4'] != 0) {
		
	
	$prod = $_POST["prod4"];
	
	$qnt = $_POST["qnt4"];
	
	$conn = new DatabaseUtility();
	
    $conn->connect();
	
	$prod4 = $conn->calc_sale($prod,$qnt);
	
	echo $prod4."<br>";
	
	
	} 
	
	if (!empty($_POST['prod5'])&& $_POST['qnt5'] != 0) {
		
	
	$prod = $_POST["prod5"];
	
	$qnt = $_POST["qnt5"];
	
	$conn = new DatabaseUtility();
	
    $conn->connect();
	
	$prod5 = $conn->calc_sale($prod,$qnt);
	
	echo $prod5."<br>";
	
	
	} 
	
	$valor_total = $prod1 + $prod2 + $prod3 + $prod4 + $prod5;
	
	echo "Valor total R$ ".$valor_total;














