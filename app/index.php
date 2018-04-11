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

$comment    = isset($_POST['comment']) && !empty($_POST['comment']) ? htmlentities($_POST['comment']) : false;
$username   = isset($_POST['username']) ? htmlentities($_POST['username']) : false;
$idComment  = isset($_POST['idComment']) && !empty($_POST['idComment']) ? (int)$_POST['idComment'] : false;
$id         = isset($_GET['id']) && !empty($_GET['id']) ? (int)$_GET['id'] : false;


if ($comment && $username) {
    $comment = str_replace("<script>","", $comment);
    $result = mysqli_query($mysqli, 'INSERT INTO security_woot.comments (username, content) VALUES("'.$username.'", "'.$comment.'")');
    header('Location:index.php');
} else if ($idComment) {
    if(is_numeric($idComment)){
        $selectedComment  = mysqli_query($mysqli, 'SELECT * FROM comments WHERE id = ' . $idComment .'LIMIT 1 ;');
    }
} else if ($id) {
    if(is_numeric($id)){
        $id = mysqli_query($mysqli, 'DELETE FROM comments WHERE id = ' . $id);
    }
    header('Location:index.php');
} else if ((isset($_POST['comment']) && $_POST['comment'] == "")
            && isset($_POST['username'])  && !$idComment){
    header('Location:index.php');
}

// Récuperation des commentaires
$comments = mysqli_query($mysqli, "SELECT * FROM comments ;");

$mysqli->close();
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
        <select name="idComment">
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
            <button><a href="?id=<?= $com['id'] ;?>">Delete</a></button>
        </div>
    <?php endforeach; ?>
  </body>
</html>
