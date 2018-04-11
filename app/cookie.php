<?php
session_start();

$isARealCookie = false;

if (isset($_COOKIE['PHPSESSID']) && trim($_COOKIE['PHPSESSID']) === 'chocolate') {
    $isARealCookie = true;
}

?>

<!doctype html>
<html lang="en">
<?php include('./partials/head.php');?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        <?php include('./partials/nav.php');?>
      </div>
      <div class="col">
        <?php if (!$isARealCookie): ?>
            <h1>You love cookie ? chocolate is the key 😉!</h1>
        <?php endif; ?>
        <?php if ($isARealCookie): ?>
            <h1>:O You're a real cookie</h1>
        <?php endif; ?>
        <a href="index.php" class="btn btn-secondary btn-sm">Go home</a>
      </div>
    </div>
</body>
</html>
