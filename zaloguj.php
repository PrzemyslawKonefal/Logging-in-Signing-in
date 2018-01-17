  <?php
    session_start();
    require_once"connect.php";

    if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
     {
      header('Location: index.php');
      exit();
     }


    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($connection->connect_errno!=0) {
      echo "Error: ".$connection->connect_errno;
    }
    else {
      $login = $_POST['login'];
      $haslo = $_POST['haslo'];

      $login = htmlentities($login, ENT_QUOTES, "UTF-8");
      $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

      if($result = @$connection->query(
        sprintf("SELECT * FROM uzytkownicy WHERE user = '%s' AND pass = '%s'",
        mysqli_real_escape_string($connection, $login),
        mysqli_real_escape_string($connection, $haslo))))
      {
        $users_number = $result->num_rows;
        if ($users_number > 0)
        {
          $_SESSION['logged'] = true;
          $wiersz = $result->fetch_assoc();
          $_SESSION['id'] = $wiersz['id'];
          $_SESSION['user'] = $wiersz['user'];
          $_SESSION['email'] = $wiersz['email'];
          $_SESSION['drewno'] = $wiersz['drewno'];
          $_SESSION['kamien'] = $wiersz['kamien'];
          $_SESSION['zboze'] = $wiersz['zboze'];
          $_SESSION['dnipremium'] = $wiersz['dnipremium'];
          $result->close();
          unset($_SESSION['Log_Err']);
          header('Location: gra.php');
        }
        else
        {
          $_SESSION['Log_Err'] = "<h3 style='color:red;'>Nieprawidłowy login lub hasło</h3>";

          header('Location: index.php');
        }
      }
      $connection->close();
    }
     ?>
