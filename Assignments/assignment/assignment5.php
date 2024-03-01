<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'Directories.php';

    // Get directory name and file content from form
    $dirname = $_POST['dirname'];
    $fileContent = $_POST['filecontent'];

    // Create Directories object
    $directories = new Directories();

    // Attempt to create directory and file
    $result = $directories->createDirectoryAndFile($dirname, $fileContent);

    // Output success or error message after form submission
    if ($result === true) {
        $message = "File and directory where created";
        $filePath = 'directories/' . $dirname . '/readme.txt';
    } else {
        $message = $result;
    }
}
?>
<?php if (isset($message)) : ?>
    <?php if ($result === true) : ?>
        <?php echo $message; ?>
        <p><a href="<?php echo $filePath; ?>" target="_blank">Path where file is located</a></p>
    <?php else : ?>
        <?php echo $message; ?>
    <?php endif; ?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Create Directory and File</title>
    <style>
        body {
            margin: 20px;
        
        }
        .container {
            max-width: 600px
            margin: 0 auto;
        }
        </style>
    </head>
    <body>
    </div>
       
        <header>
			<h1>File and Directory Assignment</h1>
            <p>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.</p>
		</header>
        <form action="" method="post">
        <div class="mb-3">
        
            <label for="dirname" class="form-label">File Name</label>
            <input type="text" class="form-control" id="dirname" name="dirname" required>
        </div>
        <div class="mb-3">
            <label for="filecontent" class="form-label">File Content</label>
            <textarea id="filecontent" class="form-control" name="filecontent" rows="4" cols="50" required></textarea><br>

        <button class="btn btn-primary" type="submit" name ="submitButton">Submit</button>
    </form>
</body>
</html>