<?php
  $news_title = '';
  $news_date = '';
  if (isset($_GET['poll_id'])) {
      $news_id = $_GET['poll_id'];
      require_once dirname(__DIR__) . '../../functions/function.php';
      $news_array = getSmthFromPolls('ID_poll', $news_id);
      if (count($news_array) > 0) {
          $news_item = $news_array[0];
          $news_title = $news_item['name_poll'];
      }

      echo '<h1>' . $poll['name_poll'] . '</h1>';
      echo '<small>' . $poll['description_poll'] . '</small>';
      
      // получаем все вопросы с ответами для опроса
      $questions = getPollQuestions($poll_id);
      
      // выводим вопросы
      foreach ($questions as $question) {
          echo '<h2>' . $question['name_question'] . '</h2>';
          echo '<ul>';
          foreach ($question['answers'] as $answer) {
              // если нужно показывать результаты, выводим количество голосов
              if ($show_results) {
                  $votes = $answer['votes'];
                  echo '<li>' . $answer['name_answer'] . ' - ' . $votes . ' голосов</li>';
              }
              // иначе выводим радио-кнопки
              else {
                  $answer_id = $answer['ID_answer'];
                  echo '<li><input type="radio" name="question_' . $question['ID_question'] . '" value="' . $answer_id . '">' . $answer['name_answer'] . '</li>';
              }
          }
          echo '</ul>';
      }
  }

  function getPollQuestions($poll_id) {
    require_once dirname(__DIR__) . '../../functions/function.php';
    $questions = getSmthFromQuestions('poll_ID', $poll_id);
    foreach ($questions as &$question) {
        $answers = getSmthFromAnswers('question_ID', $question['ID_question']);
        $question['answers'] = $answers;
    }
    return $questions;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <?php require_once dirname(__DIR__) . '../blocks/head_admin.php';?>
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
    <p></p>
    <div class="col-md-8">
      <h3 class="pb-4 fst-italic border-bottom">
      <?php echo ($news_title == '') ? 'Page Title' : $news_title; ?>
      </h3>
    </div>
  </body>
</html>