<?php 
    require_once "user.php";
	if(!isset($username)) {
		header("Location: signin.php");
		exit;
    }

    if(isset($admin)) {
        header("Location: admin.php");
        exit;
    }

    require_once "db.php";
    if(isset($_POST["edit-profile"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $db->query("UPDATE userdetails SET fname='$fname', lname='$lname', email='$email', phone='$phone' WHERE id='$userid'");
        $msg = "Profile updated successfully!";
    }

    elseif(isset($_POST["edit-profile-picture"])) {
        if(isset($_FILES["image"])) {
            require_once "upload_image.php";
            $upload = uploadImage("image", "profiles-img", $userid);
            if($upload) {
                $db->query("UPDATE userdetails SET profilepicture='$upload' WHERE id='$userid'");
                $msg = "Profile picture updated successfully!";
            }
        }
    }

    $result = $db->query("SELECT * FROM userdetails WHERE id='$userid'");
    $row = $result->fetch_assoc();
    $fname = $row["fname"];
    $lname = $row["lname"];
    $email = $row["email"];
    $phone = $row["phone"];
    $profilepict = $row["profilepicture"];    
?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'default_head.php' ?>
    <title>GGWP | Profile</title>
    <link rel="stylesheet" href="styles/index.css">
    <script src="scripts/accounts-crud.js"></script>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container" style="margin-top:150px">
        <h1>Profile Page</h1>
        <?php
            if (isset($msg)) {
        ?>
            <div class="alert alert-success ">
                <?php echo $msg ?>
            </div>
        <?php
            }
        ?>
        <div class="container" style="margin-top: 30px; margin-bottom: 50px">
            <div class="row">
                <div class="col-5">
                    <img class="mb-3" style="width: 300px; height: auto" src=<?= "'$profilepict'" ?> >
                    <button type="button" id="editPictureBtn" name="edit-picture" class="btn btn-primary mb-3">Change Picture</button>
                    <form method="POST" id="uploadPicture" enctype="multipart/form-data" style="visibility: hidden">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image-file" name="image" required>
                            <label class="custom-file-label" id="image-label" for="customFile">Choose image</label>
                        </div>
                        <button type="submit" id="savePictureBtn" class="btn btn-primary mt-3" name="edit-profile-picture">Save</button>
                    </form>
                </div>
                <div class="col-7">
                    <button type="button" id="editBtn" class="btn btn-primary mb-3">Edit Profile</button>
                    <form method="POST" class="mb-3">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname" placeholder="Enter Name" value=<?="'$fname'"?> disabled requierd>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname" placeholder="Enter Name" value=<?="'$lname'"?> disabled requierd>
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Name" value=<?="'$email'"?> disabled requierd>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter Name" value=<?="'$phone'"?> disabled requierd>
                        </div>
                        <button type="submit" id="saveBtn" class="btn btn-primary" name="edit-profile" style="visibility: hidden">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script>
        $("document").ready(function() {
            //$("#saveBtn").hide();
        });

        $("#editBtn").click(function() {
            $("#saveBtn").css("visibility", "visible");
            $(".form-control").prop('disabled', false);
        });
        $("#editPictureBtn").click(function() {
            $(this).hide();
            $("#uploadPicture").css("visibility", "visible");
        });
        $("#image-file").change(function() {
            $("#image-label").text($(this).val());
        });
    </script>
</body>

</html>