<?php


function get_articles($kat) {
    $kat == 1 ? $query = "SELECT * FROM clanci WHERE arhiva='0' AND kategorija='europa' ORDER BY id DESC LIMIT 3" : $query = "SELECT * FROM clanci WHERE arhiva='0' AND kategorija='teknautas' ORDER BY id DESC LIMIT 3";
    $result = query_to_result($query);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $naslov = $row['naslov'];
        $slika = $row['slika'];
        $vrime = $row['datum'];
        article($id, $naslov,$slika,$vrime);
    }
}

function article($id, $naslov,$slika,$vrime) {

    echo "<article class='article33'>";
    echo "<a class='cllink' href='clanak.php?cl=$id'>";
    echo "<img src='$slika' alt='1'>";
    echo "<h4>".$naslov."</h4>";
    echo "<p class='vrime'>&nbsp&nbsp&nbsp|&nbsp&nbsp".substr($vrime,-5,5)."</p>";
    echo "</a>";
    echo "</article>";

}

function s_get_article($id) {
    $result = query_to_result("SELECT * FROM clanci WHERE id='".$id."';");
    $row = mysqli_fetch_array($result);

    $datum = $row['datum'];
    $naslov = $row['naslov'];
    $slika = $row['slika'];
    $kratki = $row['kratki'];
    $tekst = $row['tekst'];
    $kategorija = $row['kategorija'];
    $arhiva = $row['arhiva'];
    s_article($kategorija,$naslov,$kratki,$slika,$datum,$tekst);
}

function s_article($kategorija,$naslov,$kratki,$slika,$datum,$tekst) {
    $datum = substr($datum,8,2).substr($datum,4,4).substr($datum,0,4);
    echo "<h5>".strtoupper($kategorija)."</h5><hr>
          <h1>$naslov</h1>
          <div id='wrap-tijelo'>
          <p id='clanak_kratki'>$kratki</p>
          <img src='$slika'><hr>
          <p>$datum</p>
          <p id='tekst''>$tekst</p></div>
    ";
}

function query_to_result ($query) {
    $dbc = mysqli_connect("eu-cdbr-west-01.cleardb.com","be28d27ba72c10","7689775c","heroku_875a8262c0fabdf") or die('Error '.mysqli_connect_error());
    mysqli_set_charset($dbc,'utf8');
    return mysqli_query($dbc,$query);
}

function obrisi($id) {
    query_to_result("DELETE FROM clanci WHERE id='".$id."'");
}

function unesi($datum,$naslov,$kratki,$tekst,$slika,$kategorija,$arhiva) {
    query_to_result("INSERT INTO clanci (datum,naslov,kratki,tekst,slika,kategorija,arhiva) VALUES('$datum','$naslov','$kratki','$tekst','$slika','$kategorija','$arhiva')");
}

function unesiid($id,$datum,$naslov,$kratki,$tekst,$slika,$kategorija,$arhiva) {
    if ($slika=="") {
        $query = "UPDATE clanci SET datum='$datum', naslov='$naslov', kratki='$kratki', tekst='$tekst', kategorija='$kategorija', arhiva='$arhiva' WHERE id='$id'";
    }
    else {
        $query = "UPDATE clanci SET datum='$datum', naslov='$naslov', kratki='$kratki', tekst='$tekst', kategorija='$kategorija', arhiva='$arhiva', slika='$slika' WHERE id='$id'";
    }
    query_to_result($query);
}

function clanak1() {
    $result = query_to_result("SELECT * FROM clanci");
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $naslov = $row['naslov'];
        $slika = '../../.'.$row['slika'];
        $vrime = $row['datum'];
        clanak2($id, $naslov,$slika,$vrime);
    }
}

function clanak2($id, $naslov,$slika,$vrime) {
    echo "<article class='article33'>";
    echo "<a class='cllink' href='unos.php?cl=$id'>";
    echo "<img src='$slika' alt='1'>";
    echo "<h4>".$naslov."</h4>";
    echo "<p class='vrime'>&nbsp&nbsp&nbsp|&nbsp&nbsp".substr($vrime,-5,5)."</p>";
    echo "</a>";
    echo "</article>";
}