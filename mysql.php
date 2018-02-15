
<?php

	class mysql{
		
		private $db = DATABASE, $pass = "Suraj_20", $user = "root", $server = "localhost";
		
		function __construct(){
			$this->conn =	mysqli_connect($this->server, $this->user, $this->pass, $this->db); 
		}


		function __destruct(){
			$this->conn = NULL;	
		}

		/*
			Execute query function 
		*/

		function execute($sql){
			$result = mysqli_query($this->conn, $sql);
			return $result;
		}

		/*
			insert function 
		*/

		function insert($data, $table){
			$property = "";
			$values = "";
			$lastelement = end($data);
			foreach ($data as $key => $v){
				$coma = ($v == $lastelement)? "" : ", ";
				$property = $property. "`$key`". $coma;
				if($v == NULL )
					$values = $values. "NULL". $coma;	
				else
					$values = $values. "'$v'". $coma;
			}

			$query = "INSERT INTO `$table` ($property) VALUES ($values)";
			echo "$query";
			$this->execute($query);
		}
		
		/*
			Get Array Function 
		*/

		function getarray($sql){
			$result = $this->execute($sql);
			$ans = mysqli_fetch_assoc($result);
			return $ans;
		}

		/*
			Delete function 
		*/

		function numofrows($sql){
			$result = $this->execute($sql);
			$ans = mysqli_num_rows($result);
			return $ans;
		}
		/*
			Delete function 
		*/
		function delete($property, $value , $table){
			$query = "DELETE FROM $table WHERE $property = $value";
			$this->execute($query);
		}
		
	}

?>