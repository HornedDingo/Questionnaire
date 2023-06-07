<?php
    $conn = mysqli_connect("localhost", "root", "", "questionnare_db", 3307);
    $edit_poll_id = $_POST['edit-poll-id'];
    $edit_name_poll = $_POST['edit_name_poll'];
    $edit_main_result = $_POST['edit_main_result'];
    $edit_description_poll = $_POST['edit_description_poll'];
    $edit_status = $_POST['edit_status'];
    $sql = "UPDATE poll SET name_poll='$edit_name_poll', main_result='$edit_main_result', description_poll='$edit_description_poll', status_id='$edit_status' WHERE ID_poll='$edit_poll_id'";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>