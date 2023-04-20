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
    <?php require_once "../views/blocks/header_admin.php" ?>
    <?php require_once "../views/blocks/body_admin.php" ?>
    <?php require_once "../views/blocks/footer_admin.php" ?>
  </body>
</html>