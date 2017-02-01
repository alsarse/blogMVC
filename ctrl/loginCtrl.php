<?php
	
	require_once('../objects/Database.php');
	require_once('../objects/Usuarios.php');

	$db =Database.getConnection(); 

	$user = new Usuario($db);

	if(isset($_REQUEST['loginData'])){
		$user->username = $_REQUEST['username'];
		$user->password = $_REQUEST['pass'];

		$login = $user->validUser(); 
		$row = $login->fetch(PDO::FETCH_ASSOC);

		if($row['password']==md5($user->password)){
			$valid= true; 
			$_SESSION['user']=$user->username;
		}else {
			$valid= false; 
		}
	}

	if(isset($_REQUEST['logout'])){
		$user->unset();
		session_destroy();	
	}

?>