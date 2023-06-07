<?php 
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <?php require_once dirname(__DIR__) . '/views/blocks/head_main.php' ?>
    <?php require_once dirname(__DIR__) . '../db/connection.php' ?>
    <body>
        <div class="container" style="background: antiquewhite; margin-top: 3rem; width:50%;">
            <h1 style="color: #d6a86c; font-family: ui-sans-serif; text-align: center;">Голосования и опросы</h1>
            <div id="polls">
            <ul style="margin-right: 2rem!important; margin: auto;margin-top:3%;">
            <?php
                connectDB();
                $user_id = $_SESSION['ID_user'];
                $sql = "SELECT * FROM poll";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $poll_id = $row["ID_poll"];
                        $sql2 = "SELECT * FROM poll_log WHERE user_ID = '$user_id' AND poll_ID = '$poll_id'";
                        $result2 = $mysqli->query($sql2);
                        if ($result2->num_rows < 1){
                            $date2='2023-05-16';
                            if (strtotime($row["start_date"]) >= strtotime(date("Y-m-d"))) {
                                echo'
                                <a href="/src//views//poll_details.php?poll_id='.$row["ID_poll"].'" style="margin-bottom:1%;" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                    <img src="/src/assets/icons/news-1.png" alt="twbs" width="30" height="30" class="flex-shrink-0">
                                    <div class="d-flex gap-2 w-100 justify-content-between">
                                        <div>
                                            <h6 class="mb-0">'.$row["name_poll"].'</h6>
                                            <p class="mb-0 opacity-75">'.explode("\n", wordwrap($row["description_poll"], 250))[0].'...</p>
                                        </div>
                                    </div>
                                </a>
                                ';
                            }
                        }
                    }
                } else {
                    echo "Нет опросов";
                }
                ?>
            </ul>
            </div>
        </div>
    <!-- <script src="/src/js/polls.js"></script> -->
    </body>
</html>