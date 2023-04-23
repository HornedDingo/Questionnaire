<button type="button" class="btn btn-primary" onclick="showAddForm()">Добавить новость</button>
<div>
    <table id="myTable2" class="display" width="80%">
        <thead>
            <tr>
            <th style="display: none;">ID новости</th>
            <th class="th_head">Заголовок</th>
            <th class="th_head">Содержание</th>
            <th class="th_head">Дата добавления</th>
            <th class="th_head">Действия</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            <th style="display: none;">ID новости</th>
            <th class="th_head">Заголовок</th>
            <th class="th_head">Содержание</th>
            <th class="th_head">Дата добавления</th>
            <th class="th_head">Действия</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
            require_once __DIR__ . '/../../functions/function.php';
            connectDB();
            $result = $mysqli->query("SELECT ID_news, name_news, date_of_addition FROM news");
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $stmt = $mysqli->prepare("SELECT description_news, user_ID FROM news_details WHERE news_ID = ?");
                    $stmt->bind_param("i", $row['ID_news']);
                    $stmt->execute();
                    $result2 = $stmt->get_result();
                    $details = mysqli_fetch_assoc($result2);
                    $short_description = strlen($details["description_news"]) > 100 ? substr($details["description_news"], 0, 100) . "..." : $details["description_news"];
                    echo "<tr>
                            <td style='display: none;'>" . $row["ID_news"] . "</td>
                            <td style='background-color: #FFFFFF; width:20%'>" . $row["name_news"] . "</td>
                            <td style='background-color: #FFFFFF; width:40%'>" . $short_description . "</td>
                            <td style='background-color: #FFFFFF;'>" . $row["date_of_addition"] . "</td>
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