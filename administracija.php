<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>El Confidencial</title>
    <link rel="stylesheet" href="src/dat/style.css">
</head>

<body>
<div id="wrapper">
    <header>
        <?php include "./src/dat/header.php";?>
    </header>

    <?php
    if ($_SESSION['lvl']) {
        if ($_SESSION['lvl'] == 4) {
            echo "Dobrodošli, administratore!<br>";
            //;
            echo "<a href='src/dat/administracija/change.php'><button class='log'>UREDI POSTOJEĆI ČLANAK</button></a><br>";
            echo "<a href='src/dat/administracija/unos.php'><button class='log'>DODAJ NOVI ČLANAK</button></a><br>";
        }
        echo "<a href='src/dat/administracija/logout.php'><button class='log'>ODJAVI SE</button></a><br>";
    }
    else {
        echo "<a href='src/dat/administracija/login.php'><button class='log'>ULOGIRAJ SE</button></a><br>";
        echo "<a href='src/dat/administracija/register.php'><button class='log'>REGISTRIRAJ SE</button></a>";
    }
    ?>


</div>

</body>
</html>