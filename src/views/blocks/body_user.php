<?php
if(isset($_GET['page'])) {
    switch($_GET['page']) {
        case "news":
            include("article.php");
            break;
        case "poll":
            include("polling.php");
            break;
    }
}
?>
