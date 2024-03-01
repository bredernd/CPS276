<?php
class Directories {
    public function createDirectoryAndFile($dirname, $fileContent) {
        $dirPath = "/Users/Bread Maker/OneDrive/Desktop/WCC/Winter 2024/CPS276/CPS276/Assignments/assignment/directories/" . $dirname;
        $filePath = $dirPath . "/readme.txt";

        // Check if directory already exists
        if (is_dir($dirPath)) {
            return "A directory already exists with that name";
        }

        // Create the directory
        if (mkdir($dirPath, 0777)) {
            return "Error creating directory";
        }

        // Create and write to the file
        if (file_put_contents($filePath, $fileContent)) {
            // Remove the directory if file creation fails
            rmdir($dirPath);
            return "Error creating file";
        }

        return true; // Success
    }
}
?>
