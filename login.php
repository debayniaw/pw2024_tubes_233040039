<?php
session_start();

 if (isset($_SESSION['login'])) {
     header("Location: index.php");
     exit;
}

    require 'function.php';
    $art = query("SELECT * FROM art");

    if (isset($_POST["login"])) {
        $login = login($_POST   );
    }

    if(isset($_POST["cari"]) ) {
      $art = cari($_POST["keyword"]);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/font.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            label {
                display: block;
            }
        </style>
    </head>

    <body>
        
            

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a href="#login" class="btn btn-outline-light">Login</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
               
            
          <li class="nav-item">
                </li>
          <form class="d-flex" action="" method="post" role="search">
              <input class="form-control me-2 from-cari" type="text" name="keyword" autofocus placeholder="Search"  id="keyword" autocomplete="off">
              </form>
              <button class="btn btn-outline-light "type="submit" name="cari" id="tombol-cari">Search</button>


    </div>
  </div>
</nav>

   <div class="container" id="container">
    <center><h1>The Most Expensive Painting</h1></center>
    <br>
  

<div class="row">
    <?php foreach ($art as $art) : ?>
<div class="col-lg-4 col-md-6 my-2  d-f;ex justify-content-around">

<div class="card" style="width: 18rem;">
  <img src="img/<?= $art["image"]; ?>" class="card-img-top" alt="...">
  <div class="card-body text-center" style="background-color: dark;">
    <h5 class="card-title"><?= $art["name"];?></h5>
    <br>
    <a href="details.php?id=<?= $art["id"]; ?>" class="badge text-bg-dark text-decoration-none">Details</a>
  </div>
</div>
</div>
<?php endforeach; ?>
  </div>
  </section>





        <section id="login">
        <div class="wrapper">
        <div class="login_box">
            <div class="login_header">
                <?php if (isset($login['error'])) : ?>
                    <p><?= $login['pesan']; ?></p>
                <?php endif; ?>
                <span>LOGIN</span>
            </div>

            <form action="" method="post">
                <div class="input_box">
                    <label for="username" autofocus autocomplete="off" required>Username</label>
                    <input type="text" id="username" name="username" class="input-field">
                </div>
                <div class="input_box">
                    <label for="password" autofocus autocomplete="off" required>Password</label>
                    <input type="text" id="password" name="password" class="input-field">
                </div>
                <div class="input_box">
                    <input type="submit" name="login" value="login" class="input-submit">
                </div>
              <center><p>Don't Have An Account?<a href="registrasi.php"> Sign Up Here</a></center>
        </div>
    </div>
        </section>
    </form>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/user.js"></script>
    </html>