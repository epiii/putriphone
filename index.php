<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <form class="" action="process.php" method="post">
    <label for="">No HP</label>
    <input type="hidden" name="mode" value="phonecheck">
    <input type="tel" name="no_wa" value="">
    <input type="submit" name="" value="convert">
  </form>
  <hr>

  <form class="" action="process.php" method="post">
    <input type="hidden" name="mode" value="phonelist">
    <input type="submit" name="" value="convert all">
  </form>

  <?php
    // require 'vendor/autoload.php';
    // $app = new AppController;
    //
    // echo $app->getCountryCode(99);
  ?>
</body>
</html>
