<div>
    <table id="myTable6" class="display" width="80%">
        <thead>
            <tr>
                <th style="display: none;">ID пользователя</th>
                <th class="th_head">Фамилия</th>
                <th class="th_head">Имя</th>
                <th class="th_head">Отчество</th>
                <th class="th_head">Цель визита</th>
                <th class="th_head">Статус</th>
                <th class="th_head">Действия</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th style="display: none;">ID пользователя</th>
                <th class="th_head">Фамилия</th>
                <th class="th_head">Имя</th>
                <th class="th_head">Отчество</th>
                <th class="th_head">Цель визита</th>
                <th class="th_head">Статус</th>
                <th class="th_head">Действия</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                require_once dirname(__DIR__) . '../../functions/function.php';
                connectDB();
                $result = $mysqli->query("SELECT ID_application_for_a_visit, guests_surname, guests_name, guests_patronimyc, purpose_of_the_visit, application_status_ID FROM application_for_a_visit");
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    switch($row["application_status_ID"]){
                        case 1:
                            $status = "Ожидает одобрения";
                            break;
                        case 2:
                            $status = "Одобрено";
                            break;
                        case 3:
                            $status = "Отклонено";
                            break;
                    }
                    echo "<tr><td style='display: none;'>" . $row["ID_application_for_a_visit"] . "</td>
                    <td style='background-color: #FFFFFF;'>" . $row["guests_surname"] . "</td>
                    <td style='background-color: #FFFFFF;'>" . $row["guests_name"] . "</td>
                    <td style='background-color: #FFFFFF;'>" . $row["guests_patronimyc"] . "</td>
                    <td style='background-color: #FFFFFF;'>" . $row["purpose_of_the_visit"] . "</td>
                    <td style='background-color: #FFFFFF;'>" . $status . "</td>
                    <td style='background-color: #FFFFFF;'>".null."</td></tr>";
                }
                } else {
                echo "0 results";
                }
                closeDB();
            ?>
        </tbody>
    </table>
</div>