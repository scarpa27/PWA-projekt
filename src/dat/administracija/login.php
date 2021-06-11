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
            <input type='password' name='pass' placeholder='Lozinka'><br>
            <input type='submit' name='submit' value='Prijavi se'/><br>
        </form>";


if (isset($_POST['submit']) and strlen($_POST['user'])>1 and strlen($_POST['pass'])>1) {

    $user=$_POST['user'];
    $pass=$_POST['pass'];

    $dbc = mysqli_connect("eu-cdbr-west-01.cleardb.com","be28d27ba72c10","7689775c","heroku_875a8262c0fabdf") or die('Error '.mysqli_connect_error());
    mysqli_set_charset($dbc,'utf8');
    $q="SELECT lvl, pass FROM korisnik WHERE user=?";
    $stmt = mysqli_stmt_init($dbc);
    if(mysqli_stmt_prepare($stmt,$q)) {

        mysqli_stmt_bind_param($stmt, 's', $user);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $lvl, $hash);
            mysqli_stmt_fetch($stmt);
            if (password_verify($pass, $hash)) {
                $_SESSION['lvl'] = $lvl;
                echo "<script type='text/javascript'>setTimeout(function(){ window.location = '../../../administracija.php'; }, 100);</script>";
            }
            else echo "Kriva lozinka";
        }
        else echo "Nepostojeće korisničko ime";
    }
    else echo "Greška!";
} ?>
</div>
</body>
