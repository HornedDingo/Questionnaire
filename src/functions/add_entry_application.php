<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $conn = mysqli_connect("localhost", "root", "", "questionnare_db", 3307);

    $guests_surname = $_POST['guests_surname'];
    $guests_name = $_POST['guests_name'];
    $guests_patronimyc = $_POST['guests_patronimyc'];
    $vehicles_brand = $_POST['vehicles_brand'];
    $vehicles_model = 'vehicles_model';
    $vehicles_number = $_POST['vehicles_number'];
    $color = $_POST['color'];
    $purpose_of_the_visit = $_POST['purpose_of_the_visit'];
    $user_ID = $_SESSION['ID_user'];

    $sql = "INSERT INTO application_for_a_vehicle(guests_surname, guests_name, guests_patronimyc, vehicles_brand, vehicles_model, vehicles_number, color, purpose_of_the_visit, user_ID) VALUES ('$guests_surname', '$guests_name', '$guests_patronimyc', '$vehicles_brand', '$vehicles_model', '$vehicles_number', '$color', '$purpose_of_the_visit', '$user_ID')";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
?>