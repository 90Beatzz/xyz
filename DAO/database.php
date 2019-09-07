<?php

class DatabaseUtility{

        private $dsn, $username, $password, $database, $host;
		public $name, $pdo;

        public function __construct($host = "127.0.0.1:3306", $username ="ietzz", $password = "856252", $database = "gssm"){
            $this->host = $host;
            $this->dsn = "mysqli:dbname=$database;host:$host";
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;

        }


		public function __desconstruct (){


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

        $sql = "select * from usuario";

       $query = $this->pdo->query($sql);

        while ($linha=$query->fetch(PDO::FETCH_ASSOC))
        {
            $login = $linha['login'];
            $senha = $linha['senha'];
			$name = $linha ['nome'];

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

		public function new_prod_insert ($a,$b,$c,$d,$e) {

            $sql = "INSERT INTO produto (ID,nome_prod,quant,marca,categoria,valor_uni) VALUES(DEFAULT,'$a','$b','$c','$d','$e')";

            $this->pdo->query($sql);

        }

		public function find_prod () {

			$sql = "call busca_prod";

			$query = $this->pdo->query($sql);

			while ($linha=$query->fetch(PDO::FETCH_ASSOC))
			{
				echo "============================================= <br>";
				echo "ID do Produto ".$linha['ID']."<br>";
				echo "Nome do Produto: ".$linha['nome_prod']."<br>";
				echo "Marca do Produto: ".$linha['marca']."<br>";
				echo "Quantidade em Estoque: ".$linha['quant']."<br>";
				echo "Categoria: ".$linha['categoria']."<br>";
				echo "Valor Unitario: R$ ".$linha['valor_uni']."<br>";
				}

		}


		public function calc_sale ($a,$b) {

			$sql = "call busca_prod";

			$query = $this->pdo->query($sql);

			while ($linha=$query->fetch(PDO::FETCH_ASSOC))
			{
				if ($a == $linha['ID']){
					$resultado = $b * $linha['valor_uni'];
					return ($resultado);


				}

			}





		}


		public function encon_prod_insert ($key,$prod1,$qnt1,$prod2,$qnt2,$prod3,$qnt3,$prod4,$qnt4,$prod5,$qnt5){


			// se campos do produto 1 e quantidade foram preenchidos , inserir pedido ao banco


			if (isset($prod1,$qnt1)) {
				$sql = "insert into encom_prod (ID_encom,ID_prod,quant_prod) values ('$key','$prod1','$qnt1')";
				$query = $this->pdo->query($sql);
				$sql = null;
			}

			// se campos do produto 2 e quantidade foram preenchidos , inserir pedido ao banco

			if (isset($prod2,$qnt2)) {
				$sql = "insert into encom_prod (ID_encom,ID_prod,quant_prod) values ('$key','$prod2','$qnt2')";
				$query = $this->pdo->query($sql);
				$sql = null;
			}

			// se campos do produto 3 e quantidade foram preenchidos , inserir pedido ao banco

			if (isset($prod3,$qnt3)) {
				$sql = "insert into encom_prod (ID_encom,ID_prod,quant_prod) values ('$key','$prod3','$qnt3')";
				$query = $this->pdo->query($sql);
				$sql = null;
			}

			// se campos do produto 4 e quantidade foram preenchidos , inserir pedido ao banco

			if (isset($prod4,$qnt4)) {
				$sql = "insert into encom_prod (ID_encom,ID_prod,quant_prod) values ('$key','$prod4','$qnt4')";
				$query = $this->pdo->query($sql);
				$sql = null;
			}

			// se campos do produto 5 e quantidade foram preenchidos , inserir pedido ao banco

			if (isset($prod5,$qnt5)) {
				$sql = "insert into encom_prod (ID_encom,ID_prod,quant_prod) values ('$key','$prod5','$qnt5')";
				$query = $this->pdo->query($sql);
				$sql = null;
			}








		}

		public function encon_insert ($key,$user_id,$data_atual,$valortotal){

			$sql = "insert into encomenda (ID,ID_user,data_pedid,valor_total) values ('$key','$user_id','$data_atual','$valortotal')";

			$query = $this->pdo->query($sql);

		}

		public function prod_inser(){





		}




		public function find_user_name (){

			return $this->name;

		}





    }
