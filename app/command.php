<?php
    $step  = isset($_GET['step']) ? (int) $_GET['step'] : 1;
    $output = [];
    $hasPassed = false;

    if ($step < 1 || $step > 3) {
        die('Dude stop dat !');
    }

    if (isset($_POST['command']) && !empty(isset($_POST['command']))) {
        $cmd = $_POST['command'];

        if ($step >= 1) {
            preg_match('/^(\d+\.){3}\d+/', $cmd, $matches);
            $hasPassed = !empty($matches);
        }

        if ($step >= 2 && $hasPassed) {
            $cmd = str_replace(';', '#', $cmd);
        }

        if ($step === 3 && $hasPassed) {
            $cmd = str_replace('&&', '#', $cmd);
        }

        if ($hasPassed) {
            exec('ping -c 1 '.$cmd,$output);
        }
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
    <h1>Type your ip to ping</h1>
    <form method="post">
        <input type="text" name="command" placeholder="127.0.0.1">
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="command.php?step=1">Go to step 1</a>
    <br>
    <a href="command.php?step=2">Go to step 2</a>
    <br>
    <a href="command.php?step=3">Go to step 3</a>
    <br>
    <a href="index.php">Go to home</a>
    <pre>
        <?php
            foreach ($output as $str) {
                echo $str."<br>";
            }
        ?>
    </pre>
</body>
</html>