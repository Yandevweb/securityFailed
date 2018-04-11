<?php

    $isAdmin = false;
    $headers = getallheaders();


    if (!isset($headers['Admin-woot'])) {
        header('Admin-woot: none');
    } elseif ($headers['Admin-woot'] ===  'admin') {
        $isAdmin = true;
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Security</title>
</head>
<body>
    <h1>Try to bypass form</h1>
    <?php if (!$isAdmin): ?>
        <form action="post" action="login.php">
            <input type="text" name="login" placeholder="username">
            <input type="password" name="password" placeholder="username">
            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>
    <?php if ($isAdmin): ?>
        <h1>Congratz' bro !</h1>
    <?php endif; ?>
</body>
</html>
