<?php

require_once('pages/routes.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Assignment 10</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="container">
    <?php
    echo $nav;
       
    if (isset($result[0])) {
        echo $result[0];
    }

    if (isset($result[1])) {
        echo $result[1];
    }

    ?>
</body>

</html>