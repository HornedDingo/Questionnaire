<?php
    $mysqli = mysqli_init();
    function connectDB(){
        global $mysqli;
        $mysqli = mysqli_connect("localhost", "root", "root", "questionnare_db", 3307);
    }

    function closeDB(){
        global $mysqli;
        mysqli_close($mysqli);;
    }
?>