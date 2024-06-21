<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kenworth CRUD Application</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="container">
<?php
            include "connection.php";
            if(isset($_POST['submit']))
            {
                // write a prepared statement to insert data
                $insert = $connection->prepare("insert into scp(item, image, class, containment, description) values(?,?,?,?,?)");
                $insert->bind_param("sssss", $_POST['item'], $_POST['image'], $_POST['class'], $_POST['description'], $_POST['containment']);
                if($insert->execute())
                {
                    echo "
<div class='alert alert-success p-3 m-3'>Record successfully created</div>
                    ";
                }
                else
                {
                    echo "
<div class='alert alert-danger p-3 m-3'>Error: {$insert->error}</div>
                    ";
                }
            }
      ?>
<h1>Create a new record.</h1>
<p><a href="index.php" class="btn btn-dark">Back to index page.</a></p>
<div class="p-3 bg-light border shadow">
<form method="post" action="create.php" class="form-group">
<label>Enter SCP Item:</label>
<br>
<input type="text" name="item" placeholder="item..." class="form-control" required>
<br><br>
<label>Enter image:</label>
<br>
<input type="text" name="image" placeholder="images/nameofimage.png..." class="form-control">
<br><br>
<label>Enter class:</label>
<br>
<input type="text" name="class" placeholder="class..." class="form-control">
<br><br>
<label>Enter containment:</label>
<classbr>
<textarea name="containment" class="form-control">Enter containment:</textarea>
<br><br>
<br><br>
<label>Enter description:</label>
<classbr>
<textarea name="description" class="form-control">Enter description:</textarea>
<br><br>
<input type="submit" name="submit" class="btn btn-primary">
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>