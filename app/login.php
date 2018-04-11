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
      <div class="col-2">
        <?php include('./partials/nav.php');?>
      </div>
      <div class="col">
        <h1>Try to bypass form</h1>
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
              <h1>Congratz' bro !</h1>
          <?php endif; ?>
          <a href="index.php" class="btn btn-secondary btn-sm">Go to home <i class="material-icons">home</i></a>
      </div>
    </div>
  </div>
</body>
</html>
