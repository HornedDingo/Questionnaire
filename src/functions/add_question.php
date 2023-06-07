<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
  $conn = mysqli_connect("localhost", "root", "", "questionnare_db", 3307);
      
  $name_question = $_POST['add-name-question'];
  $poll_ID = $_POST['add_poll'];

  $sql = "INSERT INTO question(name_question, poll_ID) VALUES ('$name_question', '$poll_ID')";
  mysqli_query($conn, $sql);

  mysqli_close($conn);
?>