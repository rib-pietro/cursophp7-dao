<?php

class Sql extends PDO {

	private $conn;

	public function __construct(){

		$this->conn = new PDO("mysql:dbname=dbphp7;host=localhost;", "root", ""); //método de conexão com o banco

	}

	private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value) {
			
			$this->setParam($statement, $key, $value); //seta os valores de cada campo da tabela através do seu identificador qúe é a chave(key) do array em que estão os parâmetros recebido por parâmetro

		}

	}

	private function setParam($statement, $key, $value){ //redefine o bindParam, faz a mesma coisa, no entanto, facilita a conexão por já receber o $statement como parâmetro, isto é, a variável em que a queria foi realizada

		$statement->bindParam($key, $value); 

	}

	public function query($rawQuery, $params = array()){

		$stmt = $this->conn->prepare($rawQuery); //constrói a querie

		$this->setParams($stmt, $params); //preenche os campos

		$stmt->execute(); //executa as queries

		return $stmt; //retorna a variáve ligada a querie

	}

	public function select($rawQuery, $params = array()):array{ //método específico para a query de seleção

		$stmt = $this->query($rawQuery, $params); //executa a query de seleção e armazena em $stmt a variável associada à query

		return $stmt->fetchAll(PDO::FETCH_ASSOC); //transforma o resultado num array com índices apenas associativos

	}

}

?>