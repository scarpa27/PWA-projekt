<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>El Confidencial</title>
    <link rel="stylesheet" href="../../../src/dat/style.css">
</head>

<body class="admin">
<div id="wrapper">
    <header>
        <?php include "../../../src/dat/header.php";?>
    </header>
    <?php echo "
        <form method='POST'>
            <input type='text' name='user' placeholder='Korisničko ime'><br>
            <input type='text' name='pass' placeholder='Lozinka'><br>
            <input type='text' name='ime' placeholder='Ime'><br>
            <input type='text' name='prezime' placeholder='Prezime'><br>
            <input type='submit' name='submit' value='Registriraj se'/><br>
        </form>";

    if (isset($_POST['submit'])) {
        $user=$_POST['user'];
        $pass=crypt($_POST['pass'],CRYPT_BLOWFISH);
        $ime=$_POST['ime'];
        $prezime=$_POST['prezime'];

        $dbc = mysqli_connect("localhost","root","toni","confidencial",3306) or die('Error '.mysqli_connect_error());
        $q="INSERT INTO korisnik(ime,prezime,user,pass) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($dbc);
        if(mysqli_stmt_prepare($stmt,$q)) {
            mysqli_stmt_bind_param($stmt,'ssss',$ime,$prezime,$user,$pass);
            if(mysqli_stmt_execute($stmt)) {
                echo "Registracija uspješna!";
                echo "<script type='text/javascript'>setTimeout(function(){ window.location = '../../../administracija.php'; }, 100);</script>";}
            else {
                echo "Korisničko ime se već koristi";}}
        else echo "Greška!";} ?>
</div>
</body>
