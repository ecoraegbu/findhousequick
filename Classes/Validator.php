<?php

class Validation {
  // validate required field
  public static function required($value, $fieldName) {
    if (empty(trim($value))) {
      return "$fieldName is required.";
    }
    return null;
  }

  // validate email address
  public static function email($value, $fieldName) {
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
      return "Invalid $fieldName format.";
    }
    return null;
  }

  // validate integer
  public static function integer($value, $fieldName) {
    if (!is_numeric($value) || strpos($value, '.') !== false) {
      return "$fieldName must be an integer.";
    }
    return null;
  }

  // validate float
  public static function float($value, $fieldName) {
    if (!is_numeric($value)) {
      return "$fieldName must be a float.";
    }
    return null;
  }

  // validate string length
  public static function stringLength($value, $fieldName, $minLength = null, $maxLength = null) {
    $length = strlen($value);

    if ($minLength !== null && $length < $minLength) {
      return "$fieldName must be at least $minLength characters long.";
    }

    if ($maxLength !== null && $length > $maxLength) {
      return "$fieldName must be no longer than $maxLength characters.";
    }

    return null;
  }

  // validate regex pattern
  public static function regex($value, $fieldName, $pattern) {
    if (!preg_match($pattern, $value)) {
      return "Invalid $fieldName format.";
    }
    return null;
  }

  // validate file upload
  public static function fileUpload($file, $fieldName, $allowedExtensions = [], $maxSize = null) {
    if (!isset($file['error']) || is_array($file['error'])) {
      return "Invalid $fieldName format.";
    }

    switch ($file['error']) {
      case UPLOAD_ERR_OK:
        break;
      case UPLOAD_ERR_NO_FILE:
        return "$fieldName is required.";
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
        return "$fieldName file is too large.";
      default:
        return "Unknown error occurred while uploading $fieldName file.";
    }

    if ($maxSize !== null && $file['size'] > $maxSize) {
      return "$fieldName file is too large.";
    }

    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    if (!in_array($fileExtension, $allowedExtensions)) {
      $allowedExtensionsString = implode(', ', $allowedExtensions);
      return "$fieldName file must be of type $allowedExtensionsString.";
    }

    return null;
  }
}
