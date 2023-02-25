<?php

class ImageUploader {
  private $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif'); // allowed file extensions
  private $maxSize = 10485760; // maximum file size in bytes (10MB)
  private $uploadDirectory = 'uploads/'; // directory where uploaded files will be saved

  //create the uploads folder if it doesn't exist
  public function __construct($directory = null) {
    
    if(!$directory){
      // Check if the directory exists
      $directory = ROOT_DIRECTORY . '/findhousequick/uploads/';
    }
    

    if (!is_dir($directory)) {
        // If the directory doesn't exist, create it
        if (!mkdir($directory, 0777, true)) {
            // If the directory can't be created, throw an exception
            throw new Exception('Error: Failed to create directory');
        }
      }
      print($directory);
      $this->uploadDirectory =$directory;
    }
  // method to upload an image file
  public function upload($file) {
    $filename = $file['name']; // get the file name
    $tempFilePath = $file['tmp_name']; // get the temporary file path on the server
    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION); // get the file extension

    // check if the file extension is allowed
    if (!$this->isValidExtension($fileExtension)) {
      throw new Exception('Invalid file type. Only ' . implode(', ', $this->allowedExtensions) . ' files are allowed.');
    }

    // check if the file size is within the allowed limit
    if (!$this->isValidSize($file['size'])) {
      throw new Exception('File is too large. Maximum file size is ' . $this->maxSize/1000000 . 'MB.');
    }

    // generate a unique file name and upload the file to the specified directory. we are going to replace 
    //uniqid with specific names
    $uploadPath = $this->uploadDirectory . uniqid() . '.' . $fileExtension;
    print($uploadPath);
    if (!move_uploaded_file($tempFilePath, $uploadPath)) {
      throw new Exception('Error uploading file.');
    }

    // return the path to the uploaded file
    return $uploadPath;
  }

  // private method to check if the file extension is allowed
  private function isValidExtension($extension) {
    return in_array($extension, $this->allowedExtensions);
  }

  // private method to check if the file size is within the allowed limit
  private function isValidSize($size) {
    return $size <= $this->maxSize;
  }
}
