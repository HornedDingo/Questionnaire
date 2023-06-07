<?php
    require_once dirname(__DIR__) . '/db/connection.php'; 
    require_once dirname(__DIR__) . '/models/user.php'; 
    function getNews($limit)
    {
        global $mysqli;
        connectDB();
        $result = $mysqli->query("SELECT * FROM news ORDER BY date_of_addition DESC LIMIT $limit;");
        $news_array = resultToArray($result);
        closeDB();
        return $news_array;
    }
    function getNewsDetails($new_ID)
    {
        global $mysqli;
        connectDB();
        $news_details = $mysqli->query("SELECT * FROM news_details WHERE news_ID = $new_ID");
        $news_array = resultToArray($news_details);
        closeDB();
        return $news_array[0];
    }

    function getAllNews()
    {
        global $mysqli;
        connectDB();
        $result = $mysqli->query("SELECT * FROM news ORDER BY date_of_addition DESC;");
        $news_array = resultToArray($result);
        closeDB();
        return $news_array;
    }
    
    function getAllPolls()
    {
        global $mysqli;
        connectDB();
        $result = $mysqli->query("SELECT * FROM poll ORDER BY name_poll DESC;");
        $news_array = resultToArray($result);
        closeDB();
        return $news_array;
    }
    function getSmthFromNews($column_name, $data)
    {
      global $mysqli;
      connectDB();
      $result = $mysqli->query("SELECT * FROM news WHERE $column_name = '$data'");
      $news_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
      closeDB();
      return $news_array;
    }

    function getSmthFromPolls($column_name, $data)
    {
      global $mysqli;
      connectDB();
      $result = $mysqli->query("SELECT * FROM poll WHERE $column_name = '$data'");
      $news_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
      closeDB();
      return $news_array;
    }

    function getSmthFromAnswers($column_name, $data)
    {
      global $mysqli;
      connectDB();
      $result = $mysqli->query("SELECT * FROM answer WHERE $column_name = '$data'");
      $news_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
      closeDB();
      return $news_array;
    }
    function getSmthFromQuestions($column_name, $data)
    {
      global $mysqli;
      connectDB();
      $result = $mysqli->query("SELECT * FROM question WHERE $column_name = '$data'");
      $news_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
      closeDB();
      return $news_array;
    }


    function getSmthFromTableById($column_name, $id) {
        global $mysqli;
        connectDB();
        $result = $mysqli->query("SELECT * FROM $column_name WHERE ID_poll = '$id' LIMIT 1");
        $user = $result->fetch_assoc();
        closeDB();
        return $user;
    }

    function getSmthFromTable($data)
    {
      global $mysqli;
      connectDB();
      $result = $mysqli->query("SELECT * FROM'$data'");
      $news_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
      closeDB();
      return $news_array;
    }

    function getDetailsFromNews($column_name, $data)
    {
      global $mysqli;
      connectDB();
      $result = $mysqli->query("SELECT * FROM news_details WHERE $column_name = '$data'");
      $news_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
      closeDB();
      return $news_array;
    }

    function resultToArray($result)
    {
        $array = array();
        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
        return $array;
    }

    function get5ApplicationsVisit($id_user)
    {
        global $mysqli;
        connectDB();
        $id = $id_user;
        $result = $mysqli->query("SELECT * FROM application_for_a_visit WHERE user_ID = $id ORDER BY ID_application_for_a_visit DESC LIMIT 5;");
        $news_array = resultToArray($result);
        closeDB();
        return $news_array;
    }

    function get5ApplicationsEntry($id_user)
    {
      global $mysqli;
      $id = $id_user;
      connectDB();
      $result = $mysqli->query("SELECT * FROM application_for_a_vehicle WHERE user_ID = $id ORDER BY ID_application_for_a_vehicle DESC LIMIT 5;");
      $news_array = resultToArray($result);
      closeDB();
      return $news_array;
    }

    function getApplicationStatus($id_status){
      global $mysqli;
      connectDB();
      $result = $mysqli->query("SELECT * FROM application_status WHERE ID_application_status = $id_status;");
      $news_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
      closeDB();
      return $news_array;
    }
?>