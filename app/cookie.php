<?php
session_start();

$isARealCookie = false;

if (isset($_COOKIE['PHPSESSID']) && trim($_COOKIE['PHPSESSID']) === 'chocolate') {
    $isARealCookie = true;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php if (!$isARealCookie): ?>
        <h1>You love cookie ? chocolate is the key !</h1>
    <?php endif; ?>
    <?php if ($isARealCookie): ?>
        <h1>:O You're a real cookie</h1>
    <?php endif; ?>
    <a href="index.php">Go home</a>
</body>
</html>
