<?php
function myTable($rows, $columns) {
    $htmlTable= '<table style="border: 1px solid black;border-collapse: separate; border-spacing: 2px;">';
    for ($i = 1; $i <= $rows; $i++) {
        $htmlTable .= '<tr>';
        for ($j = 1; $j <= $columns; $j++) {
            $htmlTable .= "<td style='border: 1px solid black; padding: 2px;'>Row $i Cell $j</td>";
        }
        $htmlTable .= '</tr>';
    }
    $htmlTable .= '</table>';
    return $htmlTable;
}

$table = myTable(15, 5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Assignment2Exercise3</title>
</head>
<body>
    <div class="container">
            <?php
        echo ($table)
        ?>
</body>
</html>