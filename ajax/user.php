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
