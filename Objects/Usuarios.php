<?php
	class Usuario{

		private $con;
		private $table_name = 'usuarios';

		private $username;
		private $password; 

		public function __construct($db){
			$this->con = $db; 
		}

		public function validUser(){
				session_start();

				$query = 'select password from '.$this->table_name.'where username =""'.$this->username.'"';

				$stmt = $this->con->prepare($query);
				$stmt->execute();

				return $stmt;
		}
	}

?>