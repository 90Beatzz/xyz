<?php

require ('../DAO/database.php');

// Clase Modelo de Usuario

class user_model  {
   private $nome;
   private $cpf;
   private $rg;
   private $cep;
   private $login;
   private $senha;
   private $mod = [0 => "N", 1 => "S"];
   private $set = [1 => "Atendente", 2=> "Gerente", 3=> "Administrador"];
   
   // Função de Construção da Classe
   
   public function __construct($nome,$cpf,$rg,$cep,$login,$senha,$mod,$set) {
       
       
       
    if ($mod == 0) {
       $this->mod = $this->mod[0];
   }if ($mod == 1){
       $this->mod = $this->mod[1];
   }  
   
   if ($set == 1) {
       $this->set = $this->set[1];
   }if ($set == 2){
       $this->set = $this->set[2];
   } if ($set == 3){
       $this->set = $this->set[3];
   } 
   
   
   
       $this->nome = $nome;
       $this->cpf = $cpf;
       $this->rg = $rg;
       $this->cep = $cep;
       $this->login =$login;
       $this->senha = $senha;  

       
   }
   
   public function GetNome (){
       return $this->nome;       
   }
   
      public function GetCpf (){
       return $this->cpf;       
   }
   
      public function GetRg (){
       return $this->rg;       
   }
   
      public function GetCep (){
       return $this->cep;       
   }
   
      public function GetLogin (){
       return $this->login;       
   }
   
     public function GetSenha (){
       return $this->senha;       
   }
   
   public function GetMod () {
       return $this->mod;
       
   }
   
      public function GetSetor () {
       return $this->set;
       
   }
   
           
    
    
}


