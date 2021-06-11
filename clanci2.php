<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>El Confidencial</title>
    <link rel="stylesheet" href="src/dat/style.css">
</head>

<body class="clancibody">
<div id="wrapper">
    <header>
        <?php include "./src/dat/header.php";?>
    </header>
    <div class="wrap-kategorije">
    <?php
    $result = query_to_result("SELECT * FROM clanci WHERE kategorija='teknautas' ORDER BY id DESC");
    while($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $datum = $row['datum'];
        $naslov = $row['naslov'];
        $slika = $row['slika'];
        $kratki = $row['kratki'];
        $tekst = $row['tekst'];
        $kategorija = $row['kategorija'];
        $arhiva = $row['arhiva'];
        echo "
            <article class='article50'>
            <a class='cllink' href='clanak.php?cl=$id'>
            <h2>$naslov</h2>
            <p>$kratki</p>
            <img src='$slika'>
            <p>$datum</p>";if($arhiva==1){echo "<p>arhivirano</p>";}
            echo "</a></article>";} ?>
    </div></div>
<?php include "src/dat/footer.php"; ?>
</body>