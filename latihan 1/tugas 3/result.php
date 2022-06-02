<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hasil tugas 3</title>
</head>
<body>
    <p>Nama : <?= $_SESSION["nama"]?></p>
    <br>

    <p>NIM : <?= $_SESSION["NIM"]?></p>
    <br>

    <p>email : <?= $_SESSION["email"]?></p>
    <br>

    <p>Tanggal Lahir : <?= $_SESSION["dateBirth"]?></p>
    <br>
    
    <p>Jenis Kelamin : <?= $_SESSION["gender"]?></p>
    <br>

    <p>Hobi : <?php foreach($_SESSION["hobi"] as $hobi) : ?><?= $hobi; ?><?php endforeach;?></p>
    <br>
    
    <p>Deskripsi : <?= $_SESSION["deskripsi"]?></p>
    <br>
    
    <a href="index.php">back</a>
</body>
</html>