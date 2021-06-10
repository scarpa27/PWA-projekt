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
        <?php include "src/dat/header.php";?>
    </header>

    <section id="section-1">
        <h2>EUROPA</h2>
        <div id="wrap-clanci-1">
            <?php get_articles(1); ?>
        </div>
    </section>
    <hr>

    <section>
        <h2>TEKNAUTAS</h2>
        <div id="wrap-clanci-1">
            <?php get_articles(2); ?>
        </div>
    </section>
</div>
</body>
</html>