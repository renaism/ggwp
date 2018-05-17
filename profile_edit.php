<?php
	require_once "user.php";
	if(isset($username)) {
		header("Location: index.php");
		exit;
    }
    require_once "db.php";
    $fname = "";
    $lname = "";
    $category = "";
    $price = "";
    $description = "";
    $details = "";
    $specifications = "";
    $image = "";

	if(isset($_POST["edit-profile"])) {
		$input_username = trim($_POST["username"]);
        $input_password = hash("sha256", $_POST["password"]);
        $fname = trim($_POST["fname"]);
        $lname = trim($_POST["lname"]);
        $email = trim($_POST["email"]);
        $phone = trim($_POST["phone"]);

        $check_username = $db->query("SELECT username FROM users WHERE username='$input_username'");
        $check_email = $db->query("SELECT email FROM userdetails WHERE email='$email'");
        if($check_username->num_rows >= 1 || $check_email->num_rows >= 1) {
            if($check_username->num_rows >= 1) {
                $errMsg = "Username already taken";
            }
            else {
                $errMsg = "E-mail already used";
            }
        }
        else {
            $result = $db->query("INSERT INTO users (username, password) VALUES ('$input_username', '$input_password')");
            if($result === TRUE) {
                $id = $db->insert_id;
                $db->query("INSERT INTO userdetails (id, fname, lname, email, phone) VALUES ('$id', '$fname', '$lname', '$email', '$phone')");
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $input_username;
                if(isset($_FILES["image"])) { 
                    require_once "upload_image.php";
                    $upload = uploadImage("image", "profiles-img", $id);
                    if($upload) {
                        $image = $upload;
                    }
                    else {
                        $image = "profiles-img/0.png";
                    }
                    $db->query("UPDATE userdetails SET profilepicture='$upload' WHERE id='$id'");
                }
            }
            header("Location: index.php");
		    exit;
        }
	}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'default_head.php' ?>
    <title>GGWP | Sign-up</title>
	<link rel="stylesheet" href="styles/index.css">
	<script src="scripts/accounts-crud.js"></script>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container" style="margin-top:90px">
        <h1>Please fill in this form to create an account</h1>
        <form method="POST" enctype="multipart/form-data" class="mb-3">
            <?php
                if (isset($errMsg)) {
            ?>
                <div class="form-group">
                    <div class="alert alert-danger">
                        <?php echo $errMsg; ?>
                    </div>
                </div>
            <?php
                }
            ?>
            <div class="form-group">
				<div class="form-row">
					<div class="col-md-6 col-xs-12">
						<label for="accountFirstNameInput">First Name</label>
						<input type="text" class="form-control" name="fname" placeholder="Enter First Name" required>
					</div>
					<div class="col-md-6 col-xs-12">
						<label for="accountLastNameInput">Last Name</label>
						<input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required>
					</div>
				</div>
			</div>
            <div class="form-row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="accountUserNameInput">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                        <label for="emailAddressInput">Email Address</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email Address" required>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumberInput">Phone Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required>
                    </div>
                </div>
                
            </div>
            <div class="custom-file">
                <label for="imagesInput">Profile Picture</label>
                <input type="file" class="custom-file-input" id="image-file" name="image">
                <label class="custom-file-label" id="image-label" for="customFile">Choose image</label>
            </div>
            <div class="clearfix">
                <button type="submit" name="signup" class="btn btn-primary mt-2">Create an account</button>
                <a href="index.php"><button type="button" class="btn btn-danger mt-2">Cancel</button></a>
            </div>
            
        </form>
    </div>
    <?php include 'footer.php' ?>
    <script>
        $("#image-file").change(function() {
            $("#image-label").text($(this).val());
        });
    </script>
</body>

</html>