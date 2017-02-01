<?php
	class Database {
		public $con;

		public function getConnection(){
			$this->con = null; 

			try{
				$this->con = new PDO("mysql:host=localhost;dbname=db_blog","root", "");

			}catch(PDOException $e){
				session_start();
				$_SESSION['error'] = "Connection error : ".$e->getMessage();
			}
			return $this->con; 
		}
	}
?>