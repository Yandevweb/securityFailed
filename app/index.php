<?php

$countCom        = 0;
$countSelect     = 0;
$selectedComment = null;

$mysqli = mysqli_connect('mysql', 'root', 'root');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$result = mysqli_query($mysqli,"CREATE DATABASE IF NOT EXISTS security_woot;");
$result = mysqli_query($mysqli,"CREATE TABLE IF NOT EXISTS `security_woot`.`comments` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(30) NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");

$mysqli->close();
$mysqli = mysqli_connect('mysql', 'root', 'root', 'security_woot');

$comment    = isset($_POST['comment']) && !empty($_POST['comment']) ? $_POST['comment'] : false;
$username   = isset($_POST['username']) ? $_POST['username'] : false;
$numComment = isset($_POST['numComment']) && !empty($_POST['numComment']) ? $_POST['numComment'] : false;

if ($comment && $username) {
    $result = mysqli_query($mysqli, 'INSERT INTO security_woot.comments (username, content) VALUES("'.$username.'", "'.$comment.'")');
    header('Location:index.php');
} else if ($numComment) {
    $selectedComment  = mysqli_query($mysqli, 'SELECT * FROM comments WHERE id = ' . $numComment);
} else if ((isset($_POST['comment']) && $_POST['comment'] == "")
            && isset($_POST['username'])  && !$numComment){
    header('Location:index.php');
}

// Récuperation des commentaires
$comments = mysqli_query($mysqli, "SELECT * FROM comments ;");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><a href="login.php">Go to header challenge</a></h1>
    <h1><a href="cookie.php">Go to cookie challenge</a></h1>
    <h1><a href="sub/index.php">Go to .htaccess challenge</a></h1>
    <h1><a href="command.php">Go to command challenge</a></h1>
    <h1>Book</h1>
    <form method="POST" action="index.php">
        <input name="username" placeholder="Username">
        <textarea name="comment" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Submit">
    </form>

    <form method="POST" action="index.php">
        <label>Select a comment number : </label>
        <select name="numComment">
            <option value="">Show All</option>
            <?php foreach ($comments as $com): ?>
                <?php $countSelect++; ?>
                <option value="<?= $com['id'] ?>"><?= $countSelect ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Submit">
    </form>

    <?php $comments = !empty($selectedComment) ? $selectedComment : $comments ;?>
    <?php foreach ($comments as $com): ?>
        <?php $countCom++; ?>
        <div>
            <h4>#<?= $countCom ;?> From <?= $com['username'] ;?></h4>
            <p>
                <?= $com['content'] ;?>
            </p>
        </div>
    <?php endforeach; ?>

  </body>
</html>
