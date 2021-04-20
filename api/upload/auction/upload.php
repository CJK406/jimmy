<?php
$id = $_POST['id'];
$target_dir = $id.'/';
$rand = rand(10,100000);
$target_file = $target_dir . basename($rand."-".$_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $return['status']="201";
    $return['message']="File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $return['status']="201";
    $return['message']="File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = 0;
}

//Check file size
if ($_FILES["fileToUpload"]["size"] > 134217728) {
  $uploadOk = 0;
}

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $return['status']="201";
  $return['message']="Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $return['status']="200";
      $return['filename']=basename( $rand."-".$_FILES["fileToUpload"]["name"]);

  } else {
    $return['status']="201";
  $return['message']="Sorry, there was an error uploading your file.";
  }
  echo json_encode($return);
}


?>