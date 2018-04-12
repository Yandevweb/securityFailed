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
<?php include('./partials/head.php');?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2 side-nav">
        <?php include('./partials/nav.php');?>
      </div>
      <div class="col bonus-padding">
        <h1>Try to bypass form <i class="em em-male-detective"></i></h1>
        <?php if (!$isAdmin): ?>
            <form method="post" action="login.php">
              <div class="form-group">
                <input class="form-control" type="text" name="login" placeholder="username">
                <input class="form-control" type="password" name="password" placeholder="password">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          <?php endif; ?>
          <?php if ($isAdmin): ?>
            <div class="cookie-result">
              <h2><i class="em em-scream"></i></h2>
              <h3>
                You have hacked our admin account so...,
              </h3>
              <span>
                  Congratz' bro we'll pay u beer then.
                  <i class="em em-beer"></i>
                  <i class="em em-call_me_hand"></i>
              </span>
            </div>
          <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
