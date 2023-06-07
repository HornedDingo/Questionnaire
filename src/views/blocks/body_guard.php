<?php
if(isset($_GET['page'])) {
    switch($_GET['page']) {
        case "news_read":
            include("article.php");
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
    }
}
?>
