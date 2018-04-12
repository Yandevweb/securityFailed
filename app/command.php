<?php
    $step  = isset($_GET['step']) ? (int) $_GET['step'] : 1;
    $output = [];
    $hasPassed = false;

    if ($step < 1 || $step > 3) {
        die('Dude stop dat !');
    }

    if (isset($_POST['command']) && !empty(isset($_POST['command']))) {
        $cmd = $_POST['command'];

        if ($step >= 1) {
            preg_match('/^(\d+\.){3}\d+/', $cmd, $matches);
            $hasPassed = !empty($matches);
        }

        if ($step >= 2 && $hasPassed) {
            $cmd = str_replace(';', '#', $cmd);
        }

        if ($step === 3 && $hasPassed) {
            $cmd = str_replace('&&', '#', $cmd);
        }

        if ($hasPassed) {
            exec('ping -c 1 '.$cmd,$output);
        }
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
        <h1>Type your ip to ping <br><br>
           <i class="em em-computer"></i>
           <i class="em em-twisted_rightwards_arrows"></i>
           <i class="em em-desktop_computer"></i></h1>
        <form method="post">
          <div class="input-group mb-3">
            <input class="form-control" type="text" name="command" placeholder="127.0.0.1">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Button</button>
          </div>
        </div>
        </form>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-success">
            <a href="command.php?step=1" class="btn btn-sm">Level 1</a>
          </label>
          <label class="btn btn-warning">
            <a href="command.php?step=2" class="btn btn-sm">Level 2</a>
          </label>
          <label class="btn btn-danger">
            <a href="command.php?step=3" class="btn btn-sm">Level 3</a>
          </label>
        </div>
        <?php foreach ($output as $str): ?>
        <div class="ping-result">
          <span class="woot"><?= $str;?></span>
          <span class="is">is</span>
          <i class="em em-skull"></i>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</body>
</html>
