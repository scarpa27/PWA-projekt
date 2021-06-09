<?php


if (isset($_POST['go'])) {

    $dir = './src/img/';
    $slika = $dir . basename($_FILES['slika']['name']);
    $lokacija = '../../img/' . basename($_FILES['slika']['name']);


    if (move_uploaded_file($_FILES['slika']['tmp_name'], $lokacija)) {}
    else echo "<p>Upload failed</p>";

        $datum = $_POST['datum'];
        $naslov = $_POST['naslov'];
        $kratki = $_POST['kratki'];
        $tekst = $_POST['tekst'];
        $kategorija = ($_POST['kategorija'] == "eu" ? "europa" : "teknautas");
        $arhiva = ($_POST['arhiva'] == "a1" ? "1" : "0");

        unesi($datum,$naslov,$kratki,$tekst,$slika,$kategorija,$arhiva);
}

if (isset($_POST['go1'])) {
    $id=$_GET['cl'];
    $dir = './src/img/';
    $slika="";

    if (!(empty($_FILES['slika']['name']))) {
        $slika = $dir . basename($_FILES['slika']['name']);
        $lokacija = '../../img/' . basename($_FILES['slika']['name']);
        if (!(move_uploaded_file($_FILES['slika']['tmp_name'], $lokacija))) echo "<p>Upload failed</p>";
    }

    $datum = $_POST['datum'];
    $naslov = $_POST['naslov'];
    $kratki = $_POST['kratki'];
    $tekst = $_POST['tekst'];
    $kategorija = ($_POST['kategorija'] == "eu" ? "europa" : "teknautas");
    $arhiva = ($_POST['arhiva'] == "a1" ? "1" : "0");

    unesiid($id,$datum,$naslov,$kratki,$tekst,$slika,$kategorija,$arhiva);
}

if (isset($_POST['go2'])) {
    obrisi ($_GET['cl']);
}

function obrisi($id) {
    $dbc = mysqli_connect("localhost","root","toni","confidencial") or die('Error '.mysqli_connect_error());
    mysqli_set_charset($dbc,'utf8');
    $query = "DELETE FROM clanci WHERE id='".$id."'";
    mysqli_query($dbc,$query) or die(mysqli_error());
}

function unesi($datum,$naslov,$kratki,$tekst,$slika,$kategorija,$arhiva) {
    $dbc = mysqli_connect("localhost","root","toni","confidencial") or die('Error '.mysqli_connect_error());
    mysqli_set_charset($dbc,'utf8');
    $query = "INSERT INTO clanci (datum,naslov,kratki,tekst,slika,kategorija,arhiva) VALUES('$datum','$naslov','$kratki','$tekst','$slika','$kategorija','$arhiva')";
    mysqli_query($dbc,$query) or die(mysqli_error());
}

function unesiid($id,$datum,$naslov,$kratki,$tekst,$slika,$kategorija,$arhiva) {
    $dbc = mysqli_connect("localhost","root","toni","confidencial") or die('Error '.mysqli_connect_error());
    mysqli_set_charset($dbc,'utf8');

    if ($slika=="") {
        $query = "UPDATE clanci SET datum='$datum', naslov='$naslov', kratki='$kratki', tekst='$tekst', kategorija='$kategorija', arhiva='$arhiva' WHERE id='$id'";
    }
    else {
        $query = "UPDATE clanci SET datum='$datum', naslov='$naslov', kratki='$kratki', tekst='$tekst', kategorija='$kategorija', arhiva='$arhiva', slika='$slika' WHERE id='$id'";
    }
    mysqli_query($dbc,$query) or die(mysqli_error());
}