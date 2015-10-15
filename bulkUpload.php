<?php
define("UPLOAD_DIR", "images/");
require("setup.php");
require("Picture.php");

if(!empty($_FILES['myPic']['name'][0])){
  $myPic = $_FILES['myPic'];

  $uploaded = array();
  $failed = array();

  $allowed = array('jpg', 'jpeg', 'png');

  foreach($myPic['name'] as $position => $filename) {

    $file_tmp = $myPic['tmp_name'][$position];
    $file_size = $myPic['size'][$position];
    $file_error = $myPic['error'][$position];

    $extension = explode('.', $filename);
    $extension = strtolower(end($extension));

    if(in_array($extension, $allowed)) {

      if($file_error === 0) {

          $file_dir = "images/" . $filename;

          if(move_uploaded_file($file_tmp, $file_dir)) {
            $uploaded[$position] = $file_dir;
          }else {
            $failed[$position] = "[{$filename}] failed to upload.";
          }

      } else {
        $failed[$position] = "[{$filename}] errored with code {$file_error}.";
      }

    } else {
      $failed[$position] = "[{$filename}] file extension '{$extension}' is not allowed.";
    }
if(!empty($uploaded)) {
  echo "$filename has been successfully uploaded!.";

  $picture = new Picture($local_database, $local_username, $local_password);
  $picture->addPicture($filename, $extension, $file_dir);

  // set proper permissions on the new file

  chmod(UPLOAD.DIR . $filename, 0644);
  header('Location: '.'index.php');

  
}

else if(!empty($failed)){
  print_r($failed);
}

  }
}
