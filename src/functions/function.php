<?php
    require_once dirname(__DIR__) . '/db/connection.php'; 
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
    
    function getSmthFromNews($column_name, $data)
    {
      global $mysqli;
      connectDB();
      $result = $mysqli->query("SELECT * FROM news WHERE $column_name = '$data'");
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
?>