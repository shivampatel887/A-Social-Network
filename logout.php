<?php 
	session_start();

	if(isset($_POST['logout_submit']){
		/**YET MORE TO BUILD */
		session_destroy();

	}else{
		$_SESSION['message'] = "Unauthorized access to this page";
		header("location: error.php");
	}
	
?>