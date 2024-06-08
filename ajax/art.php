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
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Artist</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($art as $art) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $art['name']; ?></td>
                <td><img src="img/<?= $art["image"]; ?>" width="150"></td>
                <td><?= $art['artist']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $art["id"]; ?>" class="badge text-bg-secondary text-decoration-none">Edit</a>
                    <a href="delete.php?id=<?= $art["id"]; ?>" class="badge text-bg-danger text-decoration-none" onclick="return confirm('yakin?');">Delete</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>