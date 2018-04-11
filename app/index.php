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
    $comment = str_replace(array("<script>", "</script>"),"", $comment);
    $result = mysqli_query($mysqli, 'INSERT INTO security_woot.comments (username, content) VALUES("'.$username.'", "'.$comment.'")');
    header('Location:index.php');
} else if ((isset($_POST['comment']) && $_POST['comment'] == "")
            && isset($_POST['username'])){
    header('Location:index.php');
}

// Récuperation des commentaires
$comments = mysqli_query($mysqli, "SELECT * FROM comments ;");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('./partials/head.php');?>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-2 side-nav">
          <?php include('./partials/nav.php');?>
        </div>
        <div class="col">
          <h1>
          <i class="em em-female-technologist"></i>
            Hack and smile guys, hack and smile
          <i class="em em-male-technologist"></i>
          </h1>
          <form method="POST" action="index.php">
            <div class="form-group">
              <input name="username" placeholder="Username" class="form-control">
              <textarea name="comment" class="form-control" id="" cols="30" rows="10"></textarea>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          <?php foreach ($comments as $com): ?>
            <div class="comments-container">
                <span><?= $com['username'] ;?></span>
                <p>
                    <?= $com['content'] ;?>
                </p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </body>
</html>
