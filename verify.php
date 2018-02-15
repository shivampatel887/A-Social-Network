<?php

	include_once("functions.php");
	session_start();
	if(isset($_GET['username']) && isset($_GET['code'])){
		
		$db = new mysql();

		$username = filter_var($_GET['username'] , FILTER_SANITIZE_EMAIL);
		$code = filter_var($_GET['code'] , FILTER_SANITIZE_STRING);

		$query = "SELECT* FROM user WHERE username='$username' && code='$code'";
		$res = $db->numofrows($query);

		if($res === 1){ 
			$q = "UPDATE user SET active='True' WHERE username='$username'";
			$db->execute($q);
			$_SESSION['message'] = "Your account is Verified";
			header("location: success.php"); 
			
		}else{
			$_SESSION['message'] = "Incorrect Verification";
			header("location: error.php"); 
		}

	}else{
		$_SESSION['message'] = "You are not allowed on verify page"; 
		header("location: error.php");
	}

?>