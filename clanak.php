<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>El Confidencial</title>
    <link rel="stylesheet" href="src/dat/clanak.css">
    <style>
        #tekst {
            font-size: 15px;
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
        }
        #clanak_kratki {
            font-family: 'Merriweather', serif;
            font-size: 15px;
        }
    </style>
</head>

<body>
<div id="wrapper">
    <header>
        <?php include "./src/dat/header.php";?>
    </header>

    <?php
    $id = $_GET['cl'];
    s_get_article($id);
    ?>
</div>
</body>