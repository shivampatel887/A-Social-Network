<?php

	//Error Message
	session_start();

	echo "<h1>Error:</h1>";

	if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
		echo "Error: " . $_SESSION['message'];
	}else{
		header("location: index.php");
	}

?>