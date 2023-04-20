<?php session_start();
  if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
  } else {
    header('Location: ../../index.php');
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Защищенная страница</title>
</head>
<body>
 <h1>Добро пожаловать, <?php echo $_SESSION["login"]; ?>!</h1>
 <p>Это защищенная страница, доступ к которой имеют только авторизованные пользователи.</p>
</body>
</html>