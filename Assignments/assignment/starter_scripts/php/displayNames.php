<?php
require_once "../classes/Pdo_methods.php";
$pdo = new PdoMethods();

//should be able to order alphabetically from sql query
$sql = "SELECT name FROM names ORDER BY name ASC";

$results = $pdo->selectNotBinded($sql);

if($results === 'error'){
    $bigBoss = (object)[
        'masterstatus' => 'error',
        'msg' => "I could not find the names you were looking for please try again and this time make sure the name is correct thank you come again."
    ];

    echo json_encode($bigBoss);

} else{

    $displayNames = "";
    foreach($results as $name){
        $displayNames .= '<p>'.implode($name).'</p>';
    }

    $bigBoss = (object)[
        'masterstatus' => 'success',
        'names' => $displayNames
    ];

    echo json_encode($bigBoss);

}

?>