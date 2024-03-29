<?php
require_once "../classes/Pdo_methods.php";
$pdo = new PdoMethods();

$sql = "TRUNCATE TABLE names";

$results = $pdo->otherNotBinded($sql);

if($results === 'error'){
    $weTryAgain = (object)[
        'masterstatus' => 'error',
        'msg' => "could not delete names"
    ];

    echo json_encode($weTryAgain);

} else{
    $weTryAgain = (object)[
        'masterstatus' => 'success',
        'msg' => "You have just deleted any and all names please come again soon!"
    ];

    echo json_encode($weTryAgain);

}
?>