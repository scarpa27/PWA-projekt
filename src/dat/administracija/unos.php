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


    <?php require_once("skripta.php"); provjera(); ?>



</div>

</body>
</html>


<?php
function provjera() {
    if ($_GET['cl']) {
        $dbc = mysqli_connect("localhost","root","toni","confidencial",3306) or die('Error '.mysqli_connect_error());
        mysqli_set_charset($dbc,'utf8');
        $query = "SELECT * FROM clanci WHERE id='".$_GET['cl']."';";
        $result = mysqli_query($dbc,$query);

        $row = mysqli_fetch_array($result);
        $datum = $row['datum'];
        $naslov = $row['naslov'];
        $slika = $row['slika'];
        $kratki = $row['kratki'];
        $tekst = $row['tekst'];
        $kategorija = $row['kategorija'];
        $arhiva = $row['arhiva'];

        forma2($datum,$naslov,$slika,$kratki,$tekst,$kategorija,$arhiva);
    }
    else {
        forma1();
    }
}

function forma1() {
    echo '<h1>UNOS ČLANKA</h1>';
    echo '<form name="unos" method="post" enctype="multipart/form-data"">';
    echo '<input type="text" name="datum" id="datum" placeholder="2021/06/31-08:59"/><br>';
    echo '<input type="text" name="naslov" id="naslov" placeholder="naslov"/><br>';
    echo '<textarea id="kratki" name="kratki" rows="4" cols="50" placeholder="kratki sadržaj"></textarea><br>';
    echo '<textarea id="tekst" name="tekst" rows="8" cols="100" placeholder="tijelo članka"></textarea><br>';
    echo '<input name="slika" type="file" accept="image/jpeg,image/gif,image/png"><br>';
    echo '<label for="eu">Europa<input type="radio" id="eu" name="kategorija" value="eu"></label>';
    echo '<label for ="te">Teknautas<input type="radio" id="te" name="kategorija" value="te"></label><br>';
    echo '';
    echo '<label for="a1">Arhiv: da<input type="radio" id="a1" name="arhiv" value="a1"></label>';
    echo '<label for ="a0">ne<input type="radio" id="a0" name="arhiv" value="a0"></label><br>';
    echo '<button type="submit" name="go">Šalji</button><br><br>';
    echo '</form>';
}

function forma2($datum,$naslov,$slika,$kratki,$tekst,$kategorija,$arhiva) {
    $sl = '../../.'.$slika;
    echo '<h1>IZMJENA ČLANKA</h1>';
    echo '<form name="unos1" method="post" enctype="multipart/form-data"">';
    echo '<input type="text" name="datum" id="datum" value="'.$datum.'"/><br>';
    echo '<input type="text" name="naslov" id="naslov" value="'.$naslov.'"/><br>';
    echo '<textarea id="kratki" name="kratki" rows="4" cols="50" >'.$kratki.'</textarea><br>';
    echo '<textarea id="tekst" name="tekst" rows="8" cols="100" >'.$tekst.'</textarea><br>';
    echo '<input name="slika" type="file" accept="image/jpeg,image/gif,image/png" ><br>';
    echo '<img style="max-width: 100px" src="'.$sl.'"><br>';
    if ($kategorija=="europa") {
        echo '<label for="eu">Europa<input type="radio" id="eu" name="kategorija" value="eu" checked></label>';
        echo '<label for ="te">Teknautas<input type="radio" id="te" name="kategorija" value="te"></label><br>';
    }
    else {
        echo '<label for="eu">Europa<input type="radio" id="eu" name="kategorija" value="eu" ></label>';
        echo '<label for ="te">Teknautas<input type="radio" id="te" name="kategorija" value="te" checked></label><br>';
    }
    if ($arhiva == 1) {
        echo '<label for="a1">Arhiv: da<input type="radio" id="a1" name="arhiv" value="a1" checked></label>';
        echo '<label for ="a0">ne<input type="radio" id="a0" name="arhiv" value="a0"></label><br>';
    }
    else {
        echo '<label for="a1">Arhiv: da<input type="radio" id="a1" name="arhiv" value="a1"></label>';
        echo '<label for ="a0">ne<input type="radio" id="a0" name="arhiv" value="a0" checked></label><br>';
    }
    echo '<button type="submit" name="go1">Izmjeni</button><br>';
    echo '</form>';
    echo '<form name="unos2" method="post">';
    echo '<button type="submit" name="go2">Obriši</button><br><br>';
    echo '</form>';

}
?>