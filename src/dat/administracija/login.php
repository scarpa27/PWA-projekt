<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>El Confidencial</title>
    <link rel="stylesheet" href="../../../src/dat/style.css">
</head>

<body>
<div id="wrapper">
    <header>
        <?php include "../../../src/dat/header.php";?>
    </header>
<?php
echo "
<form method='POST'>
    <input type='text' name='user' placeholder='Korisničko ime'><br>
    <input type='password' name='pass' placeholder='Lozinka'><br>
    <input type='submit' name='submit' value='Prijavi se'/><br>
</form>  
";

if (isset($_POST['submit']) and strlen($_POST['user'])>1 and strlen($_POST['pass'])>1) {
    $user=$_POST['user'];
    $pass=crypt($_POST['pass'],CRYPT_BLOWFISH);

    $dbc = mysqli_connect("localhost","root","toni","confidencial",3306) or die('Error '.mysqli_connect_error());
    $q="SELECT lvl FROM korisnik WHERE user=? AND pass=?";
    $stmt = mysqli_stmt_init($dbc);
    if(mysqli_stmt_prepare($stmt,$q)) {

        mysqli_stmt_bind_param($stmt,'ss',$user,$pass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt)>0) {
            mysqli_stmt_bind_result($stmt,$lvl);
            mysqli_stmt_fetch($stmt);
            $_SESSION['lvl']=$lvl;
            echo "<script type='text/javascript'>setTimeout(function(){ window.location = '../../../administracija.php'; }, 1100);</script>";
        }
        else {
            echo "Ne postoji korisnik sa zadanim kredencijalima";
        }
    }
    else {
        echo "Greška!";
    }
}
?>
</div>
</body>
