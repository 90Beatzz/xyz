<?php

class sale_model {
	
	private $id_prod;
	private $qnt_prod;
	
	
	
	public function _construct($id_prod,$qnt_prod){
		
		
		
		
		
	}
   
   
   public function keygenerate (){
	   
	$length = 6;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return ($randomString);
	   
	   
	   
   }
   
   
   
   
}
