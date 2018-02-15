<?php
	/**
		Registeration process script 
		By Bugswriter/Suraj
	**/
	

	if($_SERVER['REQUEST_METHOD'] == 'POST'){		
		$conn = new mysql();
		
		/** Gathering Information of user inside user_data array for insertion **/
		$user_data = array();
		$user_data['user_id'] = NULL;
		$user_data['first_name']  = preg_replace("/[^A-Za-z0-9?!]/",'', $_POST['first_name']);
		$user_data['last_name']	= preg_replace("/[^A-Za-z0-9?!]/", '', $_POST['last_name']);
		$user_data['username'] = filter_var($_POST['username'] , FILTER_SANITIZE_STRING);
		$user_data['email'] =	filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL);
	
		$user_data['gender'] = $_POST['gender'];
		$user_data['join_date'] = date("Y-m-d");
		$user_data['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		$user_data['password'] = sha1($user_data['password']);
		$user_data['code'] = uniqid();
		$user_data['active'] = 'False';

		// Inserting data if username not exist 
		if(!username_exist($user_data['username'])){
			
			$conn->insert($user_data, "user");
		
			$link = "http://localhost/bugswriter/verify.php?username=".$user_data['username']."&code=".$user_data['code'];

			$link = "<a href='$link'> Verify </a>";

			// I have to mail this $link on user email.

			$_SESSION['message'] = "You are successfully Registered\n$link";
			header("location: success.php");

		}else{
			$_SESSION['message'] = "USERNAME ALREADY EXISTS\n";
			header("location: error.php");
		}
	}else{
		$_SESSION['message'] = "Wrong way to get access to this page\n";
		header("location: error.php");
	}
?>