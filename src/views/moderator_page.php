<?php session_start();
  if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
  } else {
    header('Location: ../../index.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="ru" data-bs-theme="auto">
  <head>
    <?php require_once "../views/blocks/head_admin.php" ?>
  </head>
  <body>
    <?php require_once "../views/blocks/header_moderator.php" ?>
    <?php require_once "../views/blocks/body_moderator.php" ?>
  </body>
</html>