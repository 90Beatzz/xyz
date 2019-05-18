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

        public function new_user_insert ($a,$b,$c,$d,$e,$f,$mod,$set) {
 
            $sql = "INSERT INTO usuario (ID,nome,CPF,RG,CEP,login,senha,moderador,setor) VALUES(DEFAULT,'$a','$b','$c','$d','$e','$f','$mod','$set')";
            
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
                
                header("location: ../View/user_func.html");
                
            }
            
        } 


        }
        		
		public function find_user (){
			
		$sql = "select * from usuario";
		
		$query = $this->pdo->query($sql);
			
		while ($linha=$query->fetch(PDO::FETCH_ASSOC))                          
			{  
				echo "============================================= <br>";
				echo "ID de Usuario: ".$linha['ID']."<br>";
				echo "Nome: ".$linha['nome']."<br>";
				echo "CPF: ".$linha['CPF']."<br>";
				echo "RG: ".$linha['RG']."<br>";
				echo "CEP: ".$linha['CEP']."<br>";
				echo "Login: ".$linha['login']."<br>";
				echo "Senha: ".$linha['senha']."<br>";
				echo "Moderador: ".$linha['moderador']."<br>";
				echo "Setor: ".$linha['setor']."<br>";
				
				}

		}
		
		
		public function find_vend () {
			
			$sql = "call busca_por_user";
			
			$query = $this->pdo->query($sql);
			
			while ($linha=$query->fetch(PDO::FETCH_ASSOC))                          
			{  
				echo "============================================= <br>";
				echo "ID da Compra: ".$linha['id']."<br>";
				echo "Nome do Usuario: ".$linha['nome']."<br>";
				echo "Setor do Usuario: ".$linha['setor']."<br>";
				echo "Valor Total da compra: R$ ".$linha['valor_total']."<br>";
				}
			
			
			
			
		}
		
		public function new_prod_insert ($a,$b,$c,$d) {
 
            $sql = "INSERT INTO produto (ID,nome_prod,quant,marca,categoria) VALUES(DEFAULT,'$a','$b','$c','$d')";
            
            $this->pdo->query($sql);	
            
        }
		
		public function find_prod () {
			
			$sql = "call busca_prod";
			
			$query = $this->pdo->query($sql);
			
			while ($linha=$query->fetch(PDO::FETCH_ASSOC))                          
			{  
				echo "============================================= <br>";
				echo "Nome do Produto: ".$linha['nome_prod']."<br>";
				echo "Marca do Produto: ".$linha['marca']."<br>";
				echo "Quantidade em Estoque: ".$linha['quant']."<br>";
				echo "Categoria: ".$linha['categoria']."<br>";
				}
			
			
			
			
		}
		
		
		
		
		
		
    }