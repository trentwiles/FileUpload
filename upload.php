<?php
/*

Replace ok with the password you want.

*/


$pass = "ok";

if($_POST['p'] == $pass){



$name_pre = file_get_contents("https://random-word-api.herokuapp.com/word");
$name_pre0 = json_decode($name_pre, true);
$name_pre2 = $name_pre0[0];
$name = base64_encode($name_pre2);
$target_dir = "uploads/${name}/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



echo exec("cd uploads && mkdir ${name} && chmod -R 777 ${name} && echo ${name}");


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    // it worked
    $uploadOk = 1;
  } else {
    echo "Sorry, this file is not an image.<br>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.<br>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "mp4" ) {
  echo "Sorry, only JPG, JPEG, MP4, PNG & GIF files are allowed.<br>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

move_uploaded_file(
  $_FILES["file"]["tmp_name"],
  $_SERVER['DOCUMENT_ROOT'] . $target_dir . $_FILES["file"]["name"]
);

$img = $_POST["submit"];
$m = $check["mime"];

echo "<br>";
echo "<a href='${target_file}'><img src='${target_file}' /></a>";
}else{
  echo "Incorrect password.";
}
?>
