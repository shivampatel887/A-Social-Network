<?php

	/** THIS FILE IS FOR VARIOUS FUNCTIONS OF WEBSITE
		- Bugswriter/Suraj
	 **/
	
	include_once("config.php");
	include_once("mysql.php");

	/** Function for checking username exist in database or not **/

	function username_exist($user){
		$db = new mysql();
		$query = "SELECT*FROM user WHERE username='$user'";
		$x = $db->numofrows($query);
		if($x > 0){
			return true;
		}
		else{
			return false;
		}
	}

	function permissioncheck($var){
		if(!isset($var)){
			echo "FORM IS NOT SUBMITTED";
			//header("templates/permissiondeined.php");
		}
	}

?>