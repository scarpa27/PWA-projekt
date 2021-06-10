<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>El Confidencial</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="admin">
<div id="wrapper">
    <header>
        <?php include "../header.php";?>
    </header>

    <h1 class="promjenanaslov">ODABERI ČLANAK ZA PROMJENU</h1>
    <?php clanak1() ?>
</div>
</body>
</html>
