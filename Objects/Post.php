<?php

	class Posts{

		private $con; 
		private $table_name = 'posts';

		private $autor; 
		private $fecha; 
		private $title; 
		private $content; 
		private $visitas;

		public function __construct($db){
			$this->con = $db; 
		}

		public function readAll(){
			$query = "select autor, fecha, title, visitas from ".$this->table_name

			$stmt = $this->con->prepare($query);

			$stmt->execute();

			return $stmt; 		
		}

		public function getPost(){
			$query = "select content from".$this->table_name." where autor='".$this->autor."'" and date='".$this->date."'; 

			$stmt = $this->con->prepare($query);
			$stmt->execute()

			return $stmt;  
		}

		public function updatePost(){
			$query = "update ".$this->table_name." set visitas = ".$this->visitas+1." where autor='".$this->autor."' and date='".$this->date."'"

			$stmt = $this->con->execute($query);
			$stmt-> execute(); 

			return $stmt;
		}

		public function newPost(){
			$query = "insert into ".$this->table_name." values (?,?,?,?,?)";

			$stmt = $this->con->prepare($query);

			$stmt->bindParam(1, $this->autor);
			$stmt->bindParam(2, $this->date);
			$stmt->bindParam(3, $this->titulo);
			$stmt->bindParam(4, $this->visitas);
			$stmt->bindParam(5, $this->content); 

			$stmt->execute();

			return $stmt; 
		}
	}