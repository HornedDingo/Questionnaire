<?php
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    $result = $mysqli->query("SELECT ID_user, login, password, surname, name_user, patronymic, role_ID FROM user");

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {                    
            echo "<tr>
                    <td style='display: none;'>" . $row["ID_user"] . "</td>
                    <td>" . $row["login"] . "</td>
                    <td>" . $row["password"] . "</td>
                    <td>" . $row["surname"] . "</td>
                    <td>" . $row["name_user"] . "</td>
                    <td>" . $row["patronymic"] . "</td>
                    <td>".null."</td>
                </tr>";
        }
    } else {
        echo "0 results";
    }

    closeDB();
?>