<?php
require_once "/home/d/b/dbredernitz/public_html/CPS276/phpmysqltest/classes/Db_conn.php";
require_once "/home/d/b/dbredernitz/public_html/CPS276/phpmysqltest/classes/PdoMethods.php";

$output = "";

if (isset($_POST["sendPdf"])) {
    processFile();
} else {
    $output = "";
}

function processFile()
{
    // Make $output a global variable so it can be used inside and outside this function
    global $output;

    // CHECK TO SEE IF A FILE WAS UPLOADED. ERROR EQUALS 4 MEANS THERE WAS NO FILE UPLOADED
    if ($_FILES["pdf"]["error"] == 4) {
        $output = "No file was uploaded. Make sure you choose a file to upload.";
    } 
    elseif ($_FILES["pdf"]["size"] > 1000000 || $_FILES["pdf"]["error"] == 1) {
        // MAKE SURE THE FILE SIZE IS LESS THAN 1000000 BYTES. THE ERROR EQUALS ONE MEANS THE FILE WAS TOO BIG ACCORDING TO THE SETTINGS
        $output = "The PDF is too large.";
    } 
    elseif ($_FILES["pdf"]["type"] != "application/pdf") {
        // CHECK TO MAKE SURE IT IS THE CORRECT FILE TYPE (PDF)
        $output = "PDF files only, please.";
    } 
    else {
        // IF ALL CONDITIONS ARE MET, MOVE THE FILE FROM TEMPORARY LOCATION TO THE PDFS DIRECTORY
        if (!move_uploaded_file($_FILES["pdf"]["tmp_name"], "pdfs/" . $_FILES["pdf"]["name"])) {
            $output = "Sorry, there was a problem uploading that PDF.";
        } else {
            // INSERT PDF DATA INTO DATABASE
            $dbConn = new DatabaseConn();
            $pdo = $dbConn->dbOpen();
    
            if ($pdo) {
                $pdoMethods = new PdoMethods($pdo);
    
                $tableName = "files";
                $columns = array("files_name", "files_path");
                $values = array($_FILES["pdf"]["name"], "");
    
                $result = $pdoMethods->insert($tableName, $columns, $values);
    
                if ($result === false) {
                    $output = "Error uploading PDF.";
                } else {
                    $output = displayThanks();
                }
            } else {
                $output = "Failed to connect to the database.";
            }
        }
    }
}

function displayThanks()
{
    /*
    NOTICE I USE THE POST SUPERGLOBAL ARRAY TO GET THE NAME AND NOT
    THE FILES SUPERGLOBAL ARRAY. ALL FILES USE $_FILES, ALL TEXT ENTRIES USE $_POST
    */
    return <<<HTML
    <h1>Thank You!</h1>
    <p>Here's your PDF:</p>
    <p><a href="/home/d/b/dbredernitz/public_html/CPS276/files/{$_FILES['pdf']['name']}" target="_blank">View PDF</a></p>

HTML;

}

?>