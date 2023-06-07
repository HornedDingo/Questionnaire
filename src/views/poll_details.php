<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?php echo ($news_title == '') ? 'Page Title' : $news_title; ?></title>
    <?php require_once dirname(__DIR__) . '../views/blocks/head_admin.php';?>
    <?php require_once dirname(__DIR__) . '../views/blocks/header_user.php';?>
    <style>
      
      h1 {
        font-size: 36px;
        color: #333;
      }
      small {
        font-size: 14px;
        color: #999;
      }
      p {
        font-size: 16px;
        line-height: 1.5;
        color: #555;
      }
    </style>
  </head>
  <body>
    <?php
        require_once dirname(__DIR__) . '../functions/function.php';
        $selected_poll_id = $_GET["poll_id"];
        connectDB();
        $user_id = $user.
        $poll_stmt = $mysqli->prepare("SELECT ID_poll, name_poll FROM poll WHERE ID_poll = ?");
        $poll_stmt->bind_param("i", $selected_poll_id);
        $poll_stmt->execute();
        $poll_result = $poll_stmt->get_result();
        $poll_data = mysqli_fetch_assoc($poll_result);
        $question_stmt = $mysqli->prepare("SELECT ID_question, name_question FROM question WHERE poll_ID = ?");
        $question_stmt->bind_param("i", $selected_poll_id);
        $question_stmt->execute();
        $question_result = $question_stmt->get_result();
    ?>
    <div class="container" style="background: antiquewhite; margin-top: 3rem; width:50%;">
        <h1 style="color: #d6a86c; font-family: ui-sans-serif; text-align: center;"><?php echo $poll_data['name_poll'] ?></h1>
        <div id="polls">
        <ul style="margin-right: 2rem!important; margin: auto;margin-top:3%;">
            <?php
                connectDB();
                $sql = "SELECT * FROM poll";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    echo "<form action='../save_answers.php' method='post'>";
                    while ($question = mysqli_fetch_assoc($question_result)) {
                        echo '<div style="margin-bottom:1%;" class="list-group-item list-group-item-action py-3" aria-current="true">
                        ';
                        echo "<input type='hidden' name='poll_id' value='" . $selected_poll_id . "'>";
                        echo "<h3> " . $question['name_question'] . "</h3>";
                        echo "</h3>";
                        echo "<p></p>";
                        $answer_stmt = $mysqli->prepare("SELECT ID_answer, name_answer FROM answer WHERE question_ID = ?");
                        $answer_stmt->bind_param("i", $question['ID_question']);
                        $answer_stmt->execute();
                        $answer_result = $answer_stmt->get_result();
                        while ($answer = mysqli_fetch_assoc($answer_result)) {
                            echo "<p><input type='radio' name='answer_" . $question['ID_question'] . "' value=' " . $answer['ID_answer'] . "'> " . $answer['name_answer'] . "</p>";
                        }
                        echo "</div>";
                    }
                    echo "<button type='submit' style='
                        background-color: #d6a86c;
                        color: white;
                        border: 0;
                        border-radius: 5px;
                        font-size: 104%;
                        align-self: center;
                        align-content: center;
                        margin-top: 1%;
                        align-items: center;
                    '>Отправить ответы</button>";
                    echo "</form>";
                    closeDB();
                }
            ?>
        </ul>
        </div>
    </div>
  </body>
</html>