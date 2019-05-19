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
        
        
        
        
        