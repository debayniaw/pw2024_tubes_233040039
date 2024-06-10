<?php
session_start();

  if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
  }
    require 'function.php';
    $art = query("SELECT * FROM art");

    if(isset($_POST["cari"]) ) {
      $art = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/font.css">



</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand " href="#">NIAW</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <a href="logout.php" class="btn btn-outline-light">Logout</a>
      </ul>
      <form class="d-flex" action="" method="post" role="search">
        <input class="form-control me-2" type="text" name="keyword" autofocus placeholder="Search"  id="keyword" autocomplete="off">
        <button class="btn btn-outline-light" type="submit" name="cari" id="tombol-cari">Search</button>
      </form>
    </div>
  </div>
</nav>

   <div class="container" id="container">
  
<center><h2 class="h2 me-auto mb-2 mb-lg-0">The Most Expensive Painting</h2></center> 
<a href="tambah.php" class="btn btn-dark">Add Painting</a>
<br><br>

<!-- <li class="nav-item"> -->

<!-- </li> -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Artist</th>
      <th scope="col">Details</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($art as $art) : ?>
    <tr>
      <td scope="row"><?= $art['id']; ?></td>
      <td ><?= $art['name']; ?></td>
      <td ><img src="img/<?= $art['image']; ?>" width="150"></td>
      <td ><?= $art['artist']; ?></td>
      <td class="aksi">

        <a href="details.php?id=<?= $art["id"]; ?>" class="badge text-bg-dark text-decoration-none">Details</a>


            </td> 
      <td>
        <a href="edit.php?id=<?= $art["id"]; ?>" class="badge text-bg-secondary text-decoration-none">Edit</a>
        <a href="delete.php?id=<?= $art["id"]; ?>" class="badge text-bg-danger text-decoration-none" onclick="return confirm('are you sure?');">Delete</a>
       
        </td>
    </tr>
        <?php endforeach; ?>
  </tbody>
</table>
<div>
      
</div> 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script src="../js/script.js"></script>
</html>