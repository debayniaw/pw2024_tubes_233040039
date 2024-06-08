<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
require 'function.php';
$id = $_GET["id"];

$art = query("SELECT * FROM art WHERE id = $id") [0];

if (isset($_POST["submit"])) {

    if (edit($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diedit!');
            document.location.href = 'index.php';
        </script>
        ";
    } else { 
        echo "
        <script>
            alert('data gagal diedit!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <div class="container-fluid">

    <center><h2>Edit The Most Expensive Painting</h2></center>
    <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id"  value="<?= $art["id"]; ?> "require>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"  value="<?= $art["name"]; ?> "require>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label> <br>
                <img src="img/<?= $art["image"]; ?>" alt="" width="50"> <br>
                <input type="file" class="form-control" id="image" name="image"  value="<?= $art["name"]; ?>">
            </div>
            <div class="mb-3">
                <label for="artist" class="form-label">Artist</label>
                <input type="text" class="form-control" id="artist" name="artist"  value="<?= $art["artist"]; ?> "require>
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <input type="text" class="form-control" id="details" name="details"  value="<?= $art["details"]; ?> "require>
            </div>


            <button type="submit" name="submit" class="btn btn-dark">Add</button>
    </form>
</body>
</div>
</html>