<?php session_start(); ?>
    <!DOCTYPE html>
    <html lang="hr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>El Confidencial</title>
        <link rel="stylesheet" href="../style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
        <script src="form-validate.js"></script>
    </head>

<body>
<div id="wrapper">
    <header>
        <?php include "../header.php";?>
    </header>

    <h1>ODABERI ČLANAK ZA PROMJENU</h1>
    <?php clanak1() ?>
</div>
</body>

<?php

function clanak1() {
    $dbc = mysqli_connect("localhost","root","toni","confidencial",3306) or die('Error '.mysqli_connect_error());
    mysqli_set_charset($dbc,'utf8');
    $query = "SELECT * FROM clanci";
    $result = mysqli_query($dbc,$query);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $naslov = $row['naslov'];
        $slika = '../../.'.$row['slika'];
        $vrime = $row['datum'];
        clanak2($id, $naslov,$slika,$vrime);
    }
}

function clanak2($id, $naslov,$slika,$vrime) {
    echo "<article>";
    echo "<a class='cllink' href='unos.php?cl=$id'>";
    echo "<img src='$slika' alt='1'>";
    echo "<h4>".$naslov."</h4>";
    echo "<p class='vrime'>&nbsp&nbsp&nbsp|&nbsp&nbsp".substr($vrime,-5,5)."</p>";
    echo "</a>";
    echo "</article>";
}
?>
</html>
