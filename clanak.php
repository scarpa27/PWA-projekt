<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>El Confidencial</title>
    <link rel="stylesheet" href="src/dat/clanak.css">
</head>

<body>
<div id="wrapper">
<header>
    <?php include "./src/dat/header.php";?>
</header>
    <?php
    $id = $_GET['cl'];
    include "kod.php";
    s_get_article($id);
    ?>

</div>
</body>