<?php 
function uploadImage($img, $dir, $fname) {
    if(isset($_FILES[$img])) {
        $file_ext = strtolower(pathinfo(basename($_FILES[$img]["name"]), PATHINFO_EXTENSION));
        $target_dir = $dir . "/";
        $target_file = $target_dir . $fname . ".jpg";

        $check = getimagesize($_FILES[$img]["tmp_name"]);
        if(!$check) {
            $errMsg = "Warning: Image isn't uploaded. Image is not a vaild file.";
            return FALSE;
        }

        if($_FILES["image"]["size"] > 5000000) {
            $errMsg = "Warning: Image isn't uploaded. Image is too large.";
            return FALSE;
        }

        if($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg") {
            $errMsg = "Warning: Image isn't uploaded. Only JPG, JPEG, and PNG images are allowed. Your image: ". $_FILES["image"]["name"];
            return FALSE;
        }

        $uploaded = move_uploaded_file($_FILES[$img]["tmp_name"], $target_file);
        if($uploaded) {
            return $target_file;
        }
        else {
            $errMsg = "Warning: Image isn't uploaded. Failed to upload to the database.";
            return FALSE;
        }
    }
}
?>