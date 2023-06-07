<?php
$conn = mysqli_connect("localhost", "root", "", "questionnare_db", 3307);

$name_poll = $_POST['name_poll'];
$main_result = $_POST['main_result'];
$description_poll = $_POST['description_poll'];
$role_ID = $_POST['role_ID'];
$status_ID = $_POST['status_id'];
$show_results = 0;

$sql = "INSERT INTO poll (name_poll, start_date, end_date, show_results, main_result, description_poll, status_ID, role_ID) 
        VALUES ('$name_poll', NOW(), NOW(), '$show_results', '$main_result', '$description_poll', '$status_ID', '$role_ID')";
mysqli_query($conn, $sql);
mysqli_close($conn);
?>