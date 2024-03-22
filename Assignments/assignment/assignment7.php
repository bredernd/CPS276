 <?php
require_once "fileUploadProc.php";

// Check if the "Show File List" link was clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["showFileList"])) {
    // Redirect to the file list page (assignment7pt.php)
    header("Location: assignment7pt2.php");
    exit; // Stop further execution of the script
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

    <title>Awesome Form</title>

  </head>
  <body>
    <main class="container">
      <h1>File Upload</h1>

      <p><a class="link-offset-2 link-underline link-underline-opacity-0" href="https://russet-v8.wccnet.edu/~dbredernitz/CPS276/Assignments/assignment/assignment7pt2.php">Show File List</a></p>
      <form action="file_upload.php" method="post" enctype="multipart/form-data">


      	<!--<div class="form-group">
          <form action="assignment7pt2.php" method="post" target="_blank">
    <p><button type="submit" class="btn btn-link" name="showFileList">Show File List</button></p>-->
      		<label for="visitorName">File Name</label>
      		<input type="text" class="form-control" name="visitorName" id="visitorName">
      	</div>
      	<div class="form-group">
          <input type="file" name="pdf" id="pdf" class="d-none" accept=".pdf">
          <div class="form-group">
      		<input type="file" name="pdf" value="Choose File" accept=".pdf" id="pdf">
      	<!--</div>
      		<label for="pdf" class="btn btn-secondary">Choose File</label>
            <span id="file-chosen">No file chosen</span>
-->
            
      	</div>
      	<div class="form-group">
      		<input type="submit" class="btn btn-primary" name="sendPdf" value="Upload" />
      	</div>
		</form>

		<div> <?php echo $output; ?></div>
    </main>
</body>
</html>