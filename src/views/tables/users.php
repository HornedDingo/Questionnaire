<div>
    <table id="myTable" class="display" width="80%">
        <thead>
            <tr>
            <th style="display: none;">ID пользователя</th>
            <th class="th_head">Логин</th>
            <th class="th_head" style="display: none;">Пароль</th>
            <th class="th_head">Фамилия</th>
            <th class="th_head">Имя</th>
            <th class="th_head">Отчество</th>
            <th class="th_head">Действия</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            <th style="display: none;">ID пользователя</th>
            <th class="th_head">Логин</th>
            <th class="th_head" style="display: none;">Пароль</th>
            <th class="th_head">Фамилия</th>
            <th class="th_head">Имя</th>
            <th class="th_head">Отчество</th>
            <th class="th_head">Действия</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                require_once dirname(__DIR__) . '../../functions/function.php';
                connectDB();
                $result = $mysqli->query("SELECT ID_user, login, password, surname, name_user, patronymic, role_ID FROM user");

                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td style='display: none;'>" . $row["ID_user"] . "</td>
                    <td style='background-color: #FFFFFF;'>" . $row["login"] . "</td>
                    <td style='background-color: #FFFFFF; display: none;' >" . $row["password"] . "</td>
                    <td style='background-color: #FFFFFF;'>" . $row["surname"] . "</td>
                    <td style='background-color: #FFFFFF;'>" . $row["name_user"] . "</td>
                    <td style='background-color: #FFFFFF;'>" . $row["patronymic"] . "</td>
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