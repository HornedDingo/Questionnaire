<div>
    <table id="myTable5" class="display" width="80%">
        <thead>
            <tr>
            <th style="display: none;">ID ответа</th>
            <th class="th_head">Вариант ответа</th>
            <th class="th_head">Количество голосов</th>
            <th class="th_head">К вопросу относится</th>
            <th class="th_head">Действия</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            <th style="display: none;">ID ответа</th>
            <th class="th_head">Вариант ответа</th>
            <th class="th_head">Количество голосов</th>
            <th class="th_head">К вопросу относится</th>
            <th class="th_head">Действия</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
            require_once __DIR__ . '/../../functions/function.php';
            connectDB();
            $result = $mysqli->query("SELECT ID_answer, name_answer, votes, question_ID FROM answer");
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $stmt = $mysqli->prepare("SELECT name_question FROM question WHERE ID_question = ?");
                    $stmt->bind_param("i", $row['question_ID']);
                    $stmt->execute();
                    $result2 = $stmt->get_result();
                    $details = mysqli_fetch_assoc($result2);
                    echo "<tr>
                            <td style='display: none;'>" . $row["ID_question"] . "</td>
                            <td style='background-color: #FFFFFF; width:30%'>" . $row["name_answer"] . "</td>
                            <td style='background-color: #FFFFFF; width:5%'>" . $row["votes"] . "</td>
                            <td style='background-color: #FFFFFF; width:50%'>" . $details["name_question"] ."</td>
                            <td style='margin-top: 2%!important;'>
                                <a href='#' class='delete-row' style='margin-top: 2%!important;'>Удалить</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
            }
            closeDB();
        ?>
        </tbody>
    </table>
</div> 
