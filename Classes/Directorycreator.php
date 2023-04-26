<?php
class DirectoryCreator
{
  
    private $baseDirectory;

    public function __construct($baseDirectory = BASE_PATH)
    {
        $this->baseDirectory = $baseDirectory;
    }

    public function createdirectory($directory, $subdirectory, $objectName, $prop = null)
    {
      
        // Create the directory path
        $directoryPath = $this->baseDirectory . $directory . $subdirectory . $objectName;
      
        // Create the directory if it doesn't exist
        if (!file_exists($directoryPath)) {
            if (!mkdir($directoryPath, 0777, true)) {
                throw new Exception('Error creating directory.');
            }
        }
        
        // If $prop is supplied, create the $prop directory within the previously created directory
        if ($prop !== null) {
            $propDirectoryPath = $directoryPath . '/' . $prop.'/';
            
            // Create the $prop directory if it doesn't exist
            if (!file_exists($propDirectoryPath)) {
                if (!mkdir($propDirectoryPath, 0777, true)) {
                    throw new Exception('Error creating directory.');
                }
            }
            
            // Return the path to the $prop directory within the previously created directory
            return $propDirectoryPath;
            

        }
        
        // Return the path to the previously created directory
        return $directoryPath;
    }
}
