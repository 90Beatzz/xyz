<?php

require ('../DAO/database.php');

// Clase Modelo de Usuario

class prod_model  {
   private $nome;
   private $quantidade;
   private $marca;
   private $cat = [1 => "Alimento", 2=> "Bebida", 3=> "Pet", 4=> "Higiene"];
   private $valor_unit;
   
   // Função de Construção da Classe
   
   public function __construct($a,$b,$c,$d,$e) {
      
       
   if ($d == 1) {
       $this->cat = $this->cat[1];
   }if ($d == 2){
       $this->cat = $this->cat[2];
   } if ($d == 3){
       $this->cat = $this->cat[3];
   } if ($d == 4){
       $this->cat = $this->cat[4];
   } 
       $this->nome = $a;
       $this->quantidade = $b;
       $this->marca = $c;
	   $this->valor_unit = $e;
      
       
   }
   
   public function GetNome (){
       return $this->nome;       
   }
   
      public function GetQuantidade (){
       return $this->quantidade;       
   }
   
      public function GetMarca (){
       return $this->marca;       
   }
     
      public function GetCategoria () {
       return $this->cat;
       
   }
   
     public function GetValor () {
       return $this->valor_unit;
       
   }
   
           
    
    
}


