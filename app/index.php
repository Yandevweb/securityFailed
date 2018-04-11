<?php

$mysqli = mysqli_connect('mysql', 'root', 'root');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$result = mysqli_query($mysqli,"CREATE DATABASE IF NOT EXISTS security_woot;");
$result = mysqli_query($mysqli,"CREATE TABLE IF NOT EXISTS comments (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30) NOT NULL, content TEXT NOT NULL);");

$mysqli->close();
$mysqli = mysqli_connect('mysql', 'root', 'root', 'security_woot');

$comment = isset($_POST['comment']) && !empty($_POST['comment']) ? $_POST['comment'] : false;


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
    <h1>Book</h1>
    <form action="POST">
        <textarea name="comment" id="" cols="30" rows="10"></textarea>
    </form>

  <?php foreach ($comments as $com): ?>
    <div>
        <?= $com ?>
    </div>
  <?php endforeach; ?>

  </body>
</html>
