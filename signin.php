<!DOCTYPE html>
<html>
<head>
    <?php include 'default_head.php' ?>       
    <title>GGWP | Sign in</title>
	<link rel="stylesheet" type="text/css" href="styles/signin.css">
</head>
<body>
	<br>
	<br>
	<center><h1>GGWP</h1></center>
	<div class="login">
		<form action="signin_submit.php" method="post">
			<div>
				<label>Username:</label>
				<input type="text" name="username" id="username" />
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password" id="password" />
		   	</div>			
			<div>
                <input type="submit" name="signin" value="Sign-in" class="tombol"><br>
                <span id="signup">Doesn't have an account? <a href="signup.php">Sign-up here.</a> <span>
			</div>
		</form>
	</div>
</body>
</html>