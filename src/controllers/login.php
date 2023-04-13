<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $login = $_POST["login"];
 $password = $_POST["pass"];

 if ($login == "login1" && $password == "pass1") {
  $_SESSION["login"] = $login;
  header("location: welcome.php");
  exit();
 } else {
  $error = "Неправильное имя пользователя или пароль.";
  include "index.html";
 }
} else {
 include "index.html";
}