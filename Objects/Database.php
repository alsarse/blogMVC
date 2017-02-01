<?php
	class Database {

		static private $instance; 
		private $con;

		private function __construct(){
			try{
				$this->con = new PDO("mysql:host=localhost;dbname=db_blog","root", "");

			}catch(PDOException $e){
				session_start();
				$_SESSION['error'] = "Connection error : ".$e->getMessage();
			}
			return $this->con;
		}

		public static function getConnection(){
			if(!self::$instance instanceof self){
				self::$instance == new self; 
			} 
			return self::$instance; 
		}

		public function __clone(){
			trigger_error("Invalid clone of Singleton Object -> Database", E_USER_ERROR);
		}

		public function __wakeup(){
			trigger_error("Invalid serialize of Singleton Object -> Database", E_USER_ERROR); 
		}

	}
?>	