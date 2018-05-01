<?php
	if (isset($_POST['submit'])) {
	 	include_once "db.php";

	 	$name = mysqli_real_escape_string($db, $_POST['nama']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$subject = mysqli_real_escape_string($db, $_POST['subject']);
		$message = mysqli_real_escape_string($db, $_POST['pesan']);

		$sql = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message');";
		mysqli_query($db, $sql);
	 	header("location: contacts.php/?pesan=terkirim");
	 	die();
	 } 
 ?>