<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "", "questionnare_db", 3307);

    $guests_surname = $_POST['guests_surname'];
    $guests_name = $_POST['guests_name'];
    $guests_patronimyc = $_POST['guests_patronimyc'];
    $purpose_of_the_visit = $_POST['purpose_of_the_visit'];
    $user_ID = $_SESSION['ID_user'];

    $sql = "INSERT INTO application_for_a_visit(guests_surname, guests_name, guests_patronimyc, purpose_of_the_visit, user_ID) VALUES ('$guests_surname', '$guests_name', '$guests_patronimyc', '$purpose_of_the_visit', '$user_ID')";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
?>