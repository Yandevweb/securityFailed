<?php

$conn = mysqli_connect('mysql', 'root', 'root');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_query($conn,"CREATE DATABASE IF NOT EXIST `security_woot` CHARSET SET 'UTF-8'");

$comment = isset($_POST['comment']) && !empty($_POST['comment']) ? $_POST['comment'] : false;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Book</h1>
  </body>
</html>
