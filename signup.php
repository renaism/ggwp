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
        <form method="POST" action="signup_submit.php" class="mb-3">
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
            <div class="form-group">
                <label for="imagesInput">Profile Picture</label>
                <input type="text" class="form-control" name="profilepicture" placeholder="Enter Image URL">
            </div>
            <div class="clearfix">
                <button type="submit" name="signup" class="btn btn-primary mt-2">Create an account</button>
                <a href="index.php"><button type="button" class="btn btn-danger mt-2">Cancel</button></a>
            </div>
            
        </form>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>