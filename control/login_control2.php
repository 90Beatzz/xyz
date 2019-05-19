<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>XYZ | Nova Conta </title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->


	<link href="css/main.css" rel="stylesheet" media="all">  <!-- -->
</head>

<body>
    <div class="page-wrapper bg-gra-01">


	
	<form method=”get” action = ''>
 
		<input type="text" name="username">
 
	</form>
	
	
	
	
	
	
	
	<?php


require_once '../model/login_model.php';
require_once '../DAO/database.php';


class login_control extends login_model{
    
    
    
    
private $login;
private $senha;





    public function __construct($u,$s) {

        $login_code = md5($u);
        $senha_code = md5($s);
        
                

       $conn = new DatabaseUtility();
       $conn->connect();
       
       $conn->search_acess($login_code,$senha_code);
	   
	   $name = $conn->find_user_name();

	   $conn->__desconstruct();

       
    }
    
    
}

        
      if (!empty($_POST["username"]) && !empty($_POST["password"])) {

        $u = $_POST["username"];
        $s = $_POST["password"];
 
        } 
        
        $logar = new login_control ($u,$s);
        
        
        
        
        
	
	
	

	?>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->