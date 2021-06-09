<?php


function get_articles($kat) {
    $dbc = mysqli_connect("localhost","root","toni","confidencial",3306) or die('Error '.mysqli_connect_error());
    mysqli_set_charset($dbc,'utf8');
    $kat == 1 ? $query = "SELECT * FROM clanci WHERE arhiva='0' AND kategorija='europa' ORDER BY id DESC LIMIT 3" : $query = "SELECT * FROM clanci WHERE arhiva='0' AND kategorija='teknautas' ORDER BY id DESC LIMIT 3";
    $result = mysqli_query($dbc,$query);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $naslov = $row['naslov'];
        $slika = $row['slika'];
        $vrime = $row['datum'];
        article($id, $naslov,$slika,$vrime);
    }
}


function article($id, $naslov,$slika,$vrime) {

    echo "<article>";
    echo "<a class='cllink' href='clanak.php?cl=$id'>";
    echo "<img src='$slika' alt='1'>";
    echo "<h4>".$naslov."</h4>";
    echo "<p class='vrime'>&nbsp&nbsp&nbsp|&nbsp&nbsp".substr($vrime,-5,5)."</p>";
    echo "</a>";
    echo "</article>";

}


function s_get_article($id) {
    $dbc = mysqli_connect("localhost","root","toni","confidencial") or die('Error '.mysqli_connect_error());
    mysqli_set_charset($dbc,'utf8');
    $query = "SELECT * FROM clanci WHERE id='".$id."';";
    $result = mysqli_query($dbc,$query);
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
          <p>$kratki</p>
          <img src='$slika'><hr>
          <p>$datum</p>
          <p id='tekst'>$tekst</p></div>
    ";
}