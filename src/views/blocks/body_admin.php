<?php
if(isset($_GET['page'])) {
    switch($_GET['page']) {
        case "news_edit":
            include("news_admin.php");
            break;
        case "news_read":
            include("news_read.php");
            break;
        case "my_applications":
            include("my_applications.php");
            break;
        case "applications_entry":
            include("applications_entry.php");
            break;
        case "applications_visit":
            include("applications_visit.php");
            break;
        case "users":
            include("users_admin.php");
            break;
        case "polls":
            include("poll_admin.php");
            break;
        case "questions":
            include("question_admin.php");
            break;
        case "answers":
            include("answer_admin.php");
            break;
        default:
            include("main.php");
            break;
    }
}
?>
