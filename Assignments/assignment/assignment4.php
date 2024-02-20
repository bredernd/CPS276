<?php
$output = '';

if(count($_POST) > 0){
    require_once 'AddNameProc.php';
    $addName = new AddNamesProc();
    $output = $addName->addClearNames();
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <title>Add Names Splice</title>
    </head>
    <body>
    </div>
        <main class="container">
        <header>
			<h1>Add Names</h1>
		</header>
        <form action="" method="post">
        <div class="d-grid gap-2 d-md-block">
             <button class="btn btn-primary" type="submit" name ="addNamesButton">Add Name</button>
            <button class="btn btn-primary" type="submit" name="clearNamesButton">Clear Names</button>
            <div class="mb-3">
                <label for="enterName" class="form-label">Enter Name</label>
                <input type="text" class="form-control" id="enterName" name="name">
            </div>
            <div class="mb-3">
                <label for="listOfNames" class="form-label">List of Names</label>
                <textarea style="height: 500px;" class="form-control" id="namelist" name="names"><?php echo $output ?></textarea>
            </div>
        </form>
    </main>
</body>
</html>