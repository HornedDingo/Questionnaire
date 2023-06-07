<?php
    $conn = mysqli_connect("localhost", "root", "", "questionnare_db", 3307);
        
    $name_question = $_POST['add_name_answer'];
    $poll_ID = $_POST['add_question'];

    $sql = "INSERT INTO answer(name_answer, question_ID) VALUES ('$name_question', '$poll_ID')";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
?>