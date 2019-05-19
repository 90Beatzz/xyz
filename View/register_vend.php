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
	
	
	<?PHP	

	$_POST['prod1'] = null;	
	$_POST['prod2'] = null;	
	$_POST['prod3'] = null;	
	$_POST['prod4'] = null;	
	$_POST['prod5'] = null;	
	$_POST['qnt1'] = null;	
	$_POST['qnt2'] = null;	
	$_POST['qnt3'] = null;	
	$_POST['qnt4'] = null;	
	$_POST['qnt5'] = null;	
	

	
	include "../Dao/database.php";
	$este = new DatabaseUtility();
	$este->connect();
	$sql = "call busca_prod";
	$query = $este->pdo->query($sql);
	
	echo "<div class='wrapper wrapper--w780'>";
	echo "<div class='card card-3'>";
	echo "<div class='card-body'>";
	echo "<center> <h2 class='title'>Nova Venda XYZ </h2> </center>";
	
	echo "<form method='POST' action='../control/new_sale_control.php'>";
	
	echo "<div class='input-group'>";	
	echo "<div class='rs-select2 js-select-simple select--no-search'>";
	echo "<select name='prod1'>";
	echo "<option value=0 selected='' disable=''>Produto 1</option>";
	while ($linha=$query->fetch(PDO::FETCH_ASSOC))                          
		{  
			
			echo "<option value=".$linha['ID'].">".$linha['nome_prod'].", ".$linha['marca']." R$ ".$linha['valor_uni']."</option>";
		}
	echo "</select>";
	echo "<div class='select-dropdown'></div>";
		
	echo "</div>";	
	echo "</div>";
	
	echo "<div class='input-group'>";
	echo "<input class='input--style-3' type='number' placeholder='Quantidade' name='qnt1'>";
	echo "</div>";
	
	$query = null;	
	$sql = "call busca_prod";
	$query = $este->pdo->query($sql);
	
	echo "<div class='input-group'>";	
	echo "<div class='rs-select2 js-select-simple select--no-search'>";
	echo "<select name='prod2'>";
	echo "<option value=0 selected='' disable=''>Produto 2</option>";
	while ($linha=$query->fetch(PDO::FETCH_ASSOC))                          
		{  
			
			echo "<option value=".$linha['ID'].">".$linha['nome_prod'].", ".$linha['marca']." R$ ".$linha['valor_uni']."</option>";
		}
	echo "</select>";
	echo "<div class='select-dropdown'></div>";
		
	echo "</div>";	
	echo "</div>";
	
	echo "<div class='input-group'>";
	echo "<input class='input--style-3' type='number' placeholder='Quantidade' name='qnt2'>";
	echo "</div>";
	
		$query = null;	
	$sql = "call busca_prod";
	$query = $este->pdo->query($sql);
	
	echo "<div class='input-group'>";	
	echo "<div class='rs-select2 js-select-simple select--no-search'>";
	echo "<select name='prod3'>";
	echo "<option value=0 selected='' disable=''>Produto 3</option>";
	while ($linha=$query->fetch(PDO::FETCH_ASSOC))                          
		{  
			
			echo "<option value=".$linha['ID'].">".$linha['nome_prod'].", ".$linha['marca']." R$ ".$linha['valor_uni']."</option>";
		}
	echo "</select>";
	echo "<div class='select-dropdown'></div>";
		
	echo "</div>";	
	echo "</div>";
	
	echo "<div class='input-group'>";
	echo "<input class='input--style-3' type='number' placeholder='Quantidade' name='qnt3'>";
	echo "</div>";
	
		$query = null;	
	$sql = "call busca_prod";
	$query = $este->pdo->query($sql);
	
	echo "<div class='input-group'>";	
	echo "<div class='rs-select2 js-select-simple select--no-search'>";
	echo "<select name='prod4'>";
	echo "<option value=0 selected='' disable=''>Produto 4</option>";
	while ($linha=$query->fetch(PDO::FETCH_ASSOC))                          
		{  
			
			echo "<option value=".$linha['ID'].">".$linha['nome_prod'].", ".$linha['marca']." R$ ".$linha['valor_uni']."</option>";
		}
	echo "</select>";
	echo "<div class='select-dropdown'></div>";
		
	echo "</div>";	
	echo "</div>";
	
	echo "<div class='input-group'>";
	echo "<input class='input--style-3' type='number' placeholder='Quantidade' name='qnt4'>";
	echo "</div>";
	
		$query = null;	
	$sql = "call busca_prod";
	$query = $este->pdo->query($sql);
	
	echo "<div class='input-group'>";	
	echo "<div class='rs-select2 js-select-simple select--no-search'>";
	echo "<select name='prod5'>";
	echo "<option value=0 selected='' disable=''>Produto 5</option>";
	while ($linha=$query->fetch(PDO::FETCH_ASSOC))                          
		{  
			
			echo "<option value=".$linha['ID'].">".$linha['nome_prod'].", ".$linha['marca']." R$ ".$linha['valor_uni']."</option>";
		}
	echo "</select>";
	echo "<div class='select-dropdown'></div>";
		
	echo "</div>";	
	echo "</div>";
	
	echo "<div class='input-group'>";
	echo "<input class='input--style-3' type='number' placeholder='Quantidade' name='qnt5'>";
	echo "</div>";

	
	echo "<div class='p-t-10'>";
	echo "<button class='btn btn--pill btn--green' type='submit'>Enviar</button>";
	echo "</div>";
	echo "</form>";

		echo "</div>";
	echo "</div>";
	echo "</div>";
	
		
	?>
	
 
                               
    
	
	
	
		

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