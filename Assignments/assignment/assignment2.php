<?php
function myNestedList($list, $subList) {
    $htmlString = '<ul>';
    for ($i = 1; $i <= $list; $i++) {
        $htmlString .= "<li>$i";
        $htmlString .= '<ul>';
        for ($j = 1; $j <= $subList; $j++) {
            $htmlString .= "<li>$j</li>";
        }
        $htmlString .= '</ul>';
        $htmlString .= '</li>';
    }
    $htmlString .= '</ul>';
    return $htmlString;
}

$nestedList = myNestedList(4, 5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Assignment2</title>
</head>
<body>
    <div class="container">
            <?php
        print_r($nestedList)
        ?>
</body>
</html>