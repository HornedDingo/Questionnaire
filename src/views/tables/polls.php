<button id="add-row-btn" type="button" class="btn btn-primary" onclick="showAddForm()">Создать голосование</button>
<div>
    <table id="myTable3" class="display" width="80%">
        <thead>
            <tr>
            <th style="display: none;">ID голосования</th>
            <th class="th_head">Наименование</th>
            <th class="th_head">Описание</th>
            <th class="th_head">Статус</th>
            <th class="th_head">Основной результат</th>
            <th class="th_head">Действия</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            <th style="display: none;">ID голосования</th>
            <th class="th_head">Наименование</th>
            <th class="th_head">Описание</th>
            <th class="th_head">Статус</th>
            <th class="th_head">Основной результат</th>
            <th class="th_head">Действия</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
            require_once __DIR__ . '/../../functions/function.php';
            connectDB();
            $result = $mysqli->query("SELECT ID_poll, name_poll, description_poll, main_result, status_id FROM poll");
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $stmt = $mysqli->prepare("SELECT name_status FROM status WHERE ID_status = ?");
                    $stmt->bind_param("i", $row['status_id']);
                    $stmt->execute();
                    $result2 = $stmt->get_result();
                    $details = mysqli_fetch_assoc($result2);
                    $short_description = strlen($row["description_poll"]) > 100 ? substr($row["description_poll"], 0, 100) . "..." : $row["description_poll"];
                    $short_result = strlen($row["main_result"]) > 100 ? substr($row["main_result"], 0, 100) . "..." : $row["main_result"];
                    echo "<tr>
                            <td style='display: none;'>" . $row["ID_poll"] . "</td>
                            <td style='background-color: #FFFFFF; width:10%'>" . $row["name_poll"] . "</td>
                            <td style='background-color: #FFFFFF; width:30%'>" . $short_description . "</td>
                            <td style='background-color: #FFFFFF; width:5%'>" . $details["name_status"] . "</td>
                            <td style='background-color: #FFFFFF; width:30%'>" . $short_result . "</td>
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