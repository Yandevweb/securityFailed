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
              <span>
                <h3>
                  <i class="em em-scream"></i>
                  You have hack us,
                </h3>
                <h4>
                  Congratz' bro we will pay u beer then.
                  <i class="em em-beer"></i>
                  <i class="em em-call_me_hand"></i>
              </h4>
              </span>
          <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
