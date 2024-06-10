<?php
require '../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM art
        WHERE
        name LIKE '%$keyword%' OR 
        artist LIKE '%$keyword%'
        ";

$art = query($query);

?>

<div class="row">
    <?php foreach ($art as $art) : ?>
<div class="col-lg-4 col-md-6 my-2  d-f;ex justify-content-around">

<div class="card" style="width: 18rem;">
  <img src="img/<?= $art["image"]; ?>" class="card-img-top" alt="...">
  <div class="card-body text-center" style="background-color:darkgrey;">
    <h5 class="card-title"><?= $art["name"];?></h5>
    <h5><?= $art["artist"]; ?></h5>
    <br>
    <a href="details.php?id=<?= $art["id"]; ?>" class="badge text-bg-dark text-decoration-none">Details</a>
  </div>
</div>
</div>
<?php endforeach; ?>
  </div>
</table>

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