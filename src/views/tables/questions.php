<div>
    <table id="myTable4" class="display" width="80%">
        <thead>
            <tr>
            <th style="display: none;">ID вопроса</th>
            <th class="th_head">Вопрос</th>
            <th class="th_head">К опросу относится</th>
            <th class="th_head">Действия</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            <th style="display: none;">ID вопроса</th>
            <th class="th_head">Вопрос</th>
            <th class="th_head">К опросу относится</th>
            <th class="th_head">Действия</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
            require_once __DIR__ . '/../../functions/function.php';
            connectDB();
            $result = $mysqli->query("SELECT ID_question, name_question, poll_ID FROM question");
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $stmt = $mysqli->prepare("SELECT name_role FROM role WHERE ID_role = ?");
                    $stmt->bind_param("i", $row['role_ID']);
                    $stmt->execute();
                    $result2 = $stmt->get_result();
                    $details = mysqli_fetch_assoc($result2);
                    $stmt2 = $mysqli->prepare("SELECT name_poll FROM poll WHERE ID_poll = ?");
                    $stmt2->bind_param("i", $row['poll_ID']);
                    $stmt2->execute();
                    $result3 = $stmt2->get_result();
                    $details2 = mysqli_fetch_assoc($result3);
                    echo "<tr>
                            <td style='display: none;'>" . $row["ID_question"] . "</td>
                            <td style='background-color: #FFFFFF; width:50%'>" . $row["name_question"] . "</td>
                            <td style='background-color: #FFFFFF; width:30%'>" . $details2["name_poll"] ."</td>
                            <td style='margin-top: 2%!important;'>
                                <a href='#' class='edit-row' style='margin-top: 2%!important;'>Редактировать</a>
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
