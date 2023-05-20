<?php
$mysqli = new mysqli("localhost", "root", "root", "questionnare_db");

if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

$question = mysqli_real_escape_string($mysqli, $_POST['question']);
$role = (int) $_POST['role'];
$poll = (int) $_POST['poll'];

$sql = "INSERT INTO question (name_question, role_ID, poll_ID) VALUES ('$question', $role, $poll)";

$result = mysqli_query($mysqli, $sql);

if (!$result) {
  echo "Failed to add question: " . mysqli_error($mysqli);
  exit();
}

mysqli_close($mysqli);
?>