<?php
require_once "/home/d/b/dbredernitz/public_html/CPS276/phpmysqltest/classes/Db_conn.php";
require_once "/home/d/b/dbredernitz/public_html/CPS276/phpmysqltest/classes/PdoMethods.php";

function getListOfFiles()
{
    $dbConn = new DatabaseConn();
    $pdo = $dbConn->dbOpen();

    if ($pdo) {
        $pdoMethods = new PdoMethods($pdo);

        // Define the query to retrieve the list of files from the database
        $query = "SELECT * FROM files";

        // Execute the query
        $files = $pdoMethods->selectNotBinded($query);

        return $files;
    } else {
        return array(); // Return an empty array if failed to connect to the database
    }
}
?>
