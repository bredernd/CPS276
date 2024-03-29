<?php

require_once "../classes/Pdo_methods.php";
$pdo = new PdoMethods();

// Decode JSON data sent via POST request
$data = json_decode($_POST['data']);

// Check if 'name' property exists and is not empty
if (isset($data->name) && !empty($data->name)) {
    // Extract and reverse the name
    $name = $data->name;
    $separateTheNameMan = explode(" ", $name);
    $reverseIt = "{$separateTheNameMan[1]}, {$separateTheNameMan[0]}";

    // Define SQL query to insert the reversed name into the database
    $sql = "INSERT INTO names (name) VALUES (:name)";

    $bindings = [
        [':name', $reverseIt, 'str'],
    ];

    // Execute the SQL query
    $results = $pdo->otherBinded($sql, $bindings);

    // Check if the query was successful
    if($results === 'error'){
        // Handle error case
        $botResponse = (object)[
            'masterstatus' => 'error',
            'msg' => "Could not add name to database"
        ];
    } else {
        // Handle success case
        $botResponse = (object)[
            'masterstatus' => 'success',
            'msg' => "Name has been added"
        ];
    }
} else {

    $botResponse = (object)[
        'masterstatus' => 'failure',
        'msg' => 'You must enter a name'
    ];
}

// Return JSON response
echo json_encode($botResponse);
?>