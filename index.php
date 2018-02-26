<?php
	
	$title = "Welcome to Facebook";

	include_once('header.php');
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
		if(isset($_POST['signup_submit'])){
			require 'register_process.php';
		}
	
		elseif(isset($_POST['login_submit'])){
			require 'login_process.php';
		}

	}
?>



	<?php if(!$check){ ?>
	
			<h2>Signup Form</h2>
			<form method="POST" action="index.php" autocomplete="off">
				<input type="text" name="username" placeholder="USERNAME"><br>
				<input type="text" name="first_name" placeholder="FIRST NAME"><br>
				<input type="text" name="last_name" placeholder="LAST NAME"><br>
				<input type="text" name="email" placeholder="EMAIL ADDRESS"><br>
				<input type="password" name="password" placeholder="PASSWORD"><br>
				<input type="radio" name="gender" value="M" checked> Male
		  		<input type="radio" name="gender" value="F"> Female<br>
		  		<input type="submit" name="signup_submit" value="Register me">
			</form>

			<h2>Login Form</h2>
			<form method="POST" action="index.php" autocomplete="off">
				<input type="text" name="username" placeholder="USERNAME"><br>
				<input type="password" name="password" placeholder="PASSWORD"><br>
				<input type="submit" name="login_submit" value="Log in">
			</form>
	<?php }else{

		//include_once('feed.php');
		echo "You are logged in. services is yet building. Soon available :) ";
	}
	?>
	
<?php include_once('footer.php'); ?>
