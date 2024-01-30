<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
    <form method='post' action='#' class="row g-3">
        <div class="col-md-6">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="fname">
        </div>
        <div class="col-md-6">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lname">
        </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1 Hacker Way">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option>New Mexico</option>
      <option>Colorado</option>
      <option selected>Michigan</option>
      <option>Montana</option>
      <option>Oregon</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <p> Preferred method of contact </p>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="contact" id="contact" value="option1">
  <label class="form-check-label" for="contact">Email</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="contact" id="contact" value="text">
  <label class="form-check-label" for="contact">Text</label>
</div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
</body>
</html>