<?php
	require_once "user.php";
	if(isset($username)) {
		header("Location: index.php");
		exit;
	}

	$admin_signin = FALSE;
	if(isset($_POST["admin"])) {
		$admin_signin = TRUE;
		$type = "Admin";
	}
	if(!isset($type)) {
		$type = "User";
	}

	if(isset($_POST["signin"])) {
		require_once "db.php";
		$input_username = trim($_POST["username"]);
		$input_password = hash("sha256", $_POST["password"]);
		$result = null;
		if($admin_signin) {
			$result = $db->query("SELECT id, username, password FROM administrators WHERE username='$input_username'");
		}
		else {
			$result = $db->query("SELECT id, username, password FROM users WHERE username='$input_username'");
		}
		
		if($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			if($input_password == $row["password"]) {
				$_SESSION["id"] = $row["id"];
				$_SESSION["username"] = $row["username"];
				if($admin_signin) {
					$_SESSION["admin"] = $row["id"];
					header("Location: admin.php");
				}
				else {
					header("Location: index.php");
				}
				exit;
			}
			else {
				$errMsg = "Wrong Password";
			}
		}
		else {
			$errMsg = "Username not found";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'default_head.php' ?>       
    <title>GGWP |&nbsp;<?= $type ?>&nbsp;Sign in</title>
	<link rel="stylesheet" type="text/css" href="styles/signin.css">
</head>
<body>
	<br>
	<br>
	<center><a href="index.php"><h1>GGWP</h1></a></center>
	<div class="login">
		<h3 class="text-dark text-center"><?= $type ?>&nbsp;Sign-in</h3>
		<form method="post">
			<?php
                if (isset($errMsg)) {
			?>
				<div class="form-group">
					<div class="alert alert-danger">
						<?php echo $errMsg ?>
					</div>
				</div>
			<?php
                }
			?>
			
			<div>
				<label>Username:</label>
				<input type="text" name="username" id="username" required/>
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password" id="password" required/>
		   	</div>			
			<div>
				<?php if($type =="Admin") { ?><input name="admin" type="hidden"><?php } ?>
				<input type="submit" name="signin" value="Sign-in" class="tombol"><br>
				<?php if($type != "Admin") { ?>
                	<span id="signup">Doesn't have an account? <a href="signup.php">Sign-up here.</a> <span>
				<?php } ?>
			</div>
		</form>
	</div>
	<?php if($type == "Admin") { ?>
		<center><a href="signin.php">User Sign-in</a></center>
	<?php } else { ?>
		<center><a href="signin_admin.php">Administrator Sign-in</a></center>
	<?php } ?>
</body>
</html>