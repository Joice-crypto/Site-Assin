<?php
  require_once("Constants.php");

  function uploadImage($FILE, $Path) {
    $upload_file = $Path . basename($FILE['name']);
    $file_size = $FILE['size'];
    $file_extension = pathinfo($upload_file, PATHINFO_EXTENSION);

    $extensions = array('jpeg', 'jpg', 'png');

    if ($file_size > MAX_IMAGE_SIZE)
      return false;

    if (in_array($file_extension, $extensions) === false)
      return false;

    if (move_uploaded_file($FILE['tmp_name'], $upload_file))
      return true;

    return false;
  }

  function uploadFile($FILE, $Path) {
    $upload_file = $Path . basename($FILE['name']);
    $file_size = $FILE['size'];
    $file_extension = pathinfo($upload_file, PATHINFO_EXTENSION);

    $extensions = array('jpeg', 'jpg', 'png', 'doc', 'docx', 'pdf', 'txt');

    if ($file_size > MAX_FILE_SIZE)
      return false;

    if (in_array($file_extension, $extensions) === false)
      return false;

    if (move_uploaded_file($FILE['tmp_name'], $upload_file))
      return true;

    return false;
  }

  function deleteFile($FilePathName) {
    if(file_exists($FilePathName) && is_file($FilePathName)) {
      
      unlink($FilePathName);
    }
  }

  function checkExistence($FilePath, $FileName) {
    if(file_exists($FilePath . $FileName))
      return true;

    return false;
  }

 ?>
