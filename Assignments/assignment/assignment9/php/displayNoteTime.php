<?php

require_once "../classes/Date_time.php";

$dt = new Date_time();
$table = "";

if(isset($_POST["getNotes"])){

  $table = $dt->getTable();

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Display Notes</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>
    <main class="container">
      <h1>Display Notes</h1>

        <div class="form-group">
            <a href="https://russet-v8.wccnet.edu/~dbredernitz/CPS276/Assignments/assignment/assignment9/php/addNoteTime.php">Add Note</a>

        </div>

        <form method="post">
          <div class="form-group">
            <label for="begDate">Beginning Date</label>
            <input type="date" class="form-control" id="begDate" name="begDate">
          </div>

          <div class="form-group">
            <label for="endDate">Ending Date</label>
            <input type="date" class="form-control" id="endDate" name="endDate">
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="getNotes" id="getNotes" value="Get Notes"/>
          </div>
        </form>  

        <div>
          <?php echo $table; ?>
        </div>  

    </main>    
  
  </body>
</html>