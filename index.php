<?php
session_start();
if(isset($_SESSION['logged']) && $_SESSION['logged'] == true)
{
  header('Location: gra.php');
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
    <form action="zaloguj.php" method="post">
    <h1>Zaloguj się</h1>
    <?php
    if (isset($_SESSION['Log_Err'])) {
      echo $_SESSION['Log_Err'];
    }
     ?>
    <h3>Login</h3>
    <input type="text" name="login">
    <br>
    <h3>Hasło</h3>
    <input type="password" name="haslo">
    <br>
    <br>
    <input type="submit" value="Zaloguj">


      <p style="font-size:150%;"><a href="Signup.php">Zarejestruj się!</a></p>
    </form>
  </body>
</html>
