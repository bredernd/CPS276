<?php

require_once "../classes/Date_time.php";

$dt = new Date_time();
$notes = "";

if(isset($_POST["addNote"])){

  $notes = $dt->checkSubmit();

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Add Note</title>
    
  </head>
  <body>
    <main class="container">
      <h1>Add Note</h1>

        <form method="post" enctype="multipart/form-data">

            <div class="form-group">
                <a href="https://russet-v8.wccnet.edu/~dbredernitz/CPS276/Assignments/assignment/assignment9/php/displayNoteTime.php">Display Notes</a>
                <p><?php echo $notes; ?></p>
            </div>
            
            <div class="form-group">
      		    <label for="dateTime">Date and Time</label>
      		    <input type="datetime-local" class="form-control" id="dataTime" name="dateTime">
      	    </div>

      	    <div class="form-group">
                <label for="notes">Note</label>
      		    <textarea style="height: 350px;" class="form-control" name="notes" id="notes"></textarea>
      	    </div>

      	    <div class="form-group">
      		    <input type="submit" class="btn btn-primary" name="addNote" id="addNote" value="Add Note"/>
      	    </div>

	    </form>

    </main>
</body>
</html>