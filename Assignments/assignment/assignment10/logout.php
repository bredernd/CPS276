<?php

function kill_session()
{
    session_start();
    setcookie("PHPSESSID", "", time() - 3600, "/");
    session_unset();
   
}

header('Location: index.php?page=login'); 

?>