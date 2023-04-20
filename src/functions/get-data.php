<?php
    require_once dirname(__FILE__) . '../function.php';
    connectDB(); // подключаемся к базе данных

    $result = $mysqli->query("SELECT ID_user, login, password, surname, name_user, patronymic, role_ID FROM user"); // делаем запрос на получение данных
    if (mysqli_num_rows($result) > 0) { // если есть данные, формируем таблицу
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["ID_user"] . "</td>
                        <td>" . $row["login"] . "</td>
                        <td>" . $row["password"] . "</td>
                        <td>" . $row["surname"] . "</td>
                        <td>" . $row["name_user"] . "</td>
                        <td>" . $row["patronymic"] . "</td>
                        <td>".null."</td></tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Нет данных для отображения</td></tr>"; // если данных нет, выводим сообщение об отсутствии данных
    }
    closeDB(); // закрываем соединение с базой данных
?>