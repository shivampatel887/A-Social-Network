<?php

	/**
		Login process script 
		By Bugswriter/Suraj
	**/
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		$password = sha1($password);
	
		$conn = new mysql();

		$query = "SELECT * FROM user WHERE username='$username' && password = '$password'";
		$res = $conn->numofrows($query);

		if($res === 1){
				$qry = "SELECT * FROM user WHERE username='$username'";
				$data = $conn->getarray($qry);
				$v = $data['active'];
				$name = $data['first_name'];
				if($v == 'False'){
					$_SESSION['message'] = "Dear $name this account is not verified. Check Your email.\n";
					header("location: error.php");	
				}else{
					$_SESSION['id'] = $data['user_id'];
					$_SESSION['login'] = True;
					$_SESSION['message'] = "You are Logged in successfully\n";
					header("location: success.php");
				}
		}elseif(username_exist($username)){

			$_SESSION['message'] = "Entered Password is Incorrect..blabla\n";
			header("location: error.php");

		}else{

				$_SESSION['message'] = "Entered Username is incorrect\n";
				header("location: error.php");
		}
	}else{
		$_SESSION['message'] = "Wrong way to get access to this page\n";
		header("location: error.php");
	}


?>