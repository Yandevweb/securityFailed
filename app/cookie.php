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
      <div class="col-2 side-nav">
        <?php include('./partials/nav.php');?>
      </div>
      <div class="col">
        <h1>Cookie challenge <i class="em em-cookie"></i></h1>
        <?php if (!$isARealCookie): ?>
          <div class="cookie-result">
            <h2>You love cookie ? chocolate
              <i class="em em-chocolate_bar"></i>
              is the key <i class="em em-key"></i>
              !</h2>
          </div>
        <?php endif; ?>
        <?php if ($isARealCookie): ?>
          <div class="cookie-result">
            You're a real fortune cookie
            <i class="em em-fortune_cookie"></i>
            You won a banana <i class="em em-banana"></i>
          </div>
        <?php endif; ?>
      </div>
    </div>
</body>
</html>
