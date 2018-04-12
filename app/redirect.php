<?php

$hasPassed = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] === 'http://powned.hack';

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
    <?php if (!$hasPassed): ?>
        <p>You need to from <a href="http://powned.hack">http://powned.hack</a> to access this page</p>
    <?php endif; ?>
    <?php if ($hasPassed): ?>
        <p>You passed !</p>
    <?php endif; ?>
</body>
</html>
