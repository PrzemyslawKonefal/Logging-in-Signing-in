  <?php
  session_start();
  if (!isset($_SESSION['logged'])) {
    header('Location: index.php');
    exit();
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Osadnicy</title>
  </head>
  <body>
    <?php

    echo "Welcome back ".$_SESSION['user']." / ".$_SESSION['email']."  | <a href='logout.php'>Log out</a> | ";
     ?>
     <h2>Drewno:</h2><h3><?php echo $_SESSION['drewno'];?></h3>
     <h2>Stone:</h2><h3><?php echo $_SESSION['kamien'];?></h3>
     <h2>Grain:</h2><h3><?php echo $_SESSION['zboze'];?></h3>
  </body>
</html>
