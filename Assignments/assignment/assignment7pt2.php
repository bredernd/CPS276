<?php
require_once "listFilesProc.php"; // Require the file that processes the list of files

// Retrieve the list of files
$files = getListOfFiles();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>List Form</title>
    
  </head>
  <body>
    <main class="container">
      <h1>File Upload</h1>
      <p><a class="link-offset-2 link-underline link-underline-opacity-0" href="#">Add File</a></p>
      <form action="file_upload.php" method="post" enctype="multipart/form-data">
</head>
    <ul>
    <?php foreach ($files as $file): ?>
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <?php $filename = "newsletterform" . $i . ".pdf"; ?>
                <li><a target="_blank" href="/CPS276/files/<?php echo $filename; ?>">Link to <?php echo $filename; ?></a></li>
            <?php endfor; ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>