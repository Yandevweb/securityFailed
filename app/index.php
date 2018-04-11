<?php

$mysqli = mysqli_connect('mysql', 'root', 'root');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$result = mysqli_query($mysqli,"CREATE DATABASE IF NOT EXISTS security_woot;");
$result = mysqli_query($mysqli,"CREATE TABLE IF NOT EXISTS `security_woot`.`comments` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(30) NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");

$mysqli->close();

$mysqli = mysqli_connect('mysql', 'root', 'root', 'security_woot');

$comment = isset($_POST['comment']) && !empty($_POST['comment']) ? $_POST['comment'] : false;
$username = isset($_POST['username']) ? $_POST['username'] : false;

if ($comment && $username) {
    $result = mysqli_query($mysqli, 'INSERT INTO security_woot.comments (username, content) VALUES("'.$username.'", "'.$comment.'")');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Book</h1>
    <form method="POST" action="index.php">
        <input name="username" placeholder="Username">
        <textarea name="comment" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Submit">
    </form>
    <h1><a href="login.php">Go to header challenge</a></h1>
  </body>
</html>
