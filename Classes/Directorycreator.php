<?php

class DirectoryCreator {
  private $baseDirectory ;

  public function __construct($baseDirectory = ROOT_DIRECTORY) {
    $this->baseDirectory = $baseDirectory;
  }

  public function createDirectory($userId, $username, $objectName, $subdirectory) {
    //The $propertyName could either be the name of a property or the name of what ever picture to be uploaded
    // for example 'profile_pic' if you are uploading a profile picture, or 'property_id' if you are uploading
    // a property.
    $directoryName = $userId . '_' . $username;
    $directoryPath = $this->baseDirectory . $subdirectory .$directoryName;
    // create the user's directory if it doesn't exist
    if (!file_exists($directoryPath)) {
      if (!mkdir($directoryPath, 0777, true)) {
        throw new Exception('Error creating user directory.');
      }
    }

    // create the subdirectory for the property if it doesn't exist
    $objectDirectoryPath = $directoryPath . '/' . $objectName.'/';
    if (!file_exists($objectDirectoryPath)) {
      if (!mkdir($objectDirectoryPath, 0777, true)) {
        throw new Exception('Error creating property directory.');
      }
    }

    return $objectDirectoryPath;
  }
}

