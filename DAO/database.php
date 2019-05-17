<?php

class DatabaseUtility{

        private $dsn, $username, $password, $database, $pdo, $host;

        public function __construct($host = "127.0.0.1:3306", $username ="root", $password = "", $database = "gssm"){
            $this->host = $host;
            $this->dsn = "mysqli:dbname=$database;host:$host";
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
        
        
        
        //Função de Conexão ao Banco De dados

        public function connect(){
            try{
                $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password,null);
              //  $this->pdo = new PDO($this->dsn,$this->username,$this->password,null);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch(PDOException $err){
                die($err->getMessage());
            }

        }
        
        
        //Função de Inserir novo Usuario

        public function prepareStatment(){
            
            $sql = "INSERT INTO usuario (ID,nome,CPF,RG,CEP,login,senha,moderador) VALUES(DEFAULT,'b','c','d','e','f','g','N')";
            
            $this->pdo->query($sql);

        }   
        
        //Função de Novo usuario

        public function new_user_insert ($a,$b,$c,$d,$e,$f,$mod) {
 
            $sql = "INSERT INTO usuario (ID,nome,CPF,RG,CEP,login,senha,moderador) VALUES(DEFAULT,'$a','$b','$c','$d','$e','$f','$mod')";
            
            $this->pdo->query($sql);
            
        }
        
        
        // Função de Busca no banco e Acesso ao Sistema
        
        public function search_acess ($a,$b){
  
        $sql = "call login";
        
       $query = $this->pdo->query($sql);
                  
        while ($linha=$query->fetch(PDO::FETCH_ASSOC))                          
        {
            $login = $linha['login'];
            $senha = $linha['senha'];
            
            if($a == $login && $b == $senha)  {
                
                header("location: ../View/user_log.html");
                
            }
            
        } 
        
        
            
            
            
            
            
        }
        
    }