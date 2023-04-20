<button id="openCreateUserModalBtn" name="openModalBtn" type="button" class="btn btn-outline-primary me-2">Добавить</button>
<div id="createUserModal" class="popup-bg">
    <div id="createUserModalContent" class="popup">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2" style="margin: auto;">Добавить пользователя</h1>
            <button id="closeModalBtn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5 pt-0">
            <form method="post" action="../../../src/functions/add_user.php">
                <div class="form-floating mb-3">
                    <input name="login" type="text" class="form-control rounded-3" placeholder="Логин" id="login" required>
                    <label for="login">Логин</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control rounded-3" placeholder="Пароль" id="password" required>
                    <label for="password">Пароль</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="surname" type="text" class="form-control rounded-3" placeholder="Фамилия" id="surname" required>
                    <label for="surname">Фамилия</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control rounded-3" placeholder="Имя" id="name" required>
                    <label for="name">Имя</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="patronymic" type="text" class="form-control rounded-3" placeholder="Отчество" id="patronymic" required>
                    <label for="patronymic">Отчество</label>
                </div>
                <div class="form-floating mb-3">
                    <p id="fail"></p>
                </div>
                <button id="signIn" name="add_user" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Добавить запись</button>
            </form>
        </div>
    </div>
</div>
<div>
    <table id="myTable" class="display" width="80%">
        <thead>
            <tr>
            <th style="display: none;">ID пользователя</th>
            <th class="th_head">Логин</th>
            <th class="th_head">Пароль</th>
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
            <th class="th_head">Пароль</th>
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
                    <td style='background-color: #FFFFFF;'>" . $row["password"] . "</td>
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



<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ],
            "pageLength": 20,
            "order": [[ 1, "asc" ]],
            "language": {
            "lengthMenu": "Показать _MENU_ записей",
            "zeroRecords": "Ничего не найдено",
            "info": "Страница _PAGE_ из _PAGES_",
            "infoEmpty": "Нет записей для отображения",
            "infoFiltered": "(отфильтровано из _MAX_ записей)",
            "search": "",
            "paginate": {
                "first": "Первая",
                "last": "Последняя",
                "next": ">>",
                "previous": "<<"}
            },
            "dom": 'Bfrtip',
            "buttons": [
        {
          extend: 'pdf',
          text: 'Скачать в .pdf'
        }],
            "columnDefs": [
            {
            "targets":-1,
            "data": null,
            "defaultContent":"",
            "className": "dt-right",
            "render":function(data,type,row){
                return '<button class="delete-row">Удалить</button><button class="edit-row">Редактировать</button>'
            }
            }]
        });
    });
</script>

<div id="editModal" class="modal">
  <form id="editForm" action="edit_user.php" method="post">
    <input type="hidden" id="editUserId" name="id" value="">
    <label for="editLogin">Логин</label>
    <input type="text" id="editLogin" name="login" value="">
    <br><br>
    <label for="editPassword">Пароль</label>
    <input type="password" id="editPassword" name="password" value="">
    <br><br>
    <label for="editSurname">Фамилия</label>
    <input type="text" id="editSurname" name="surname" value="">
    <br><br>
    <label for="editName">Имя</label>
    <input type="text" id="editName" name="name_user" value="">
    <br><br>
    <label for="editPatronymic">Отчество</label>
    <input type="text" id="editPatronymic" name="patronymic" value="">
    <br><br>
    <input type="submit" value="Сохранить">
  </form>
</div>

<script>
    //открываем (или закрываем) форму создания нового пользователя
    var modal = document.getElementById('createUserModal');
    var openModalBtn = document.getElementById('openCreateUserModalBtn');
    var closeModalBtn = document.getElementById('closeModalBtn');
    openModalBtn.onclick = function() {
        modal.style.display = 'block';
    }
    closeModalBtn.onclick = function() {
        modal.style.display = 'none';
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    //заполняем таблицу данными (обновление таблицы)
    function updateTable() {
        $.ajax({
            url: '../functions/update_table.php',
            type: 'get',
            success: function(response) {
                $('#myTable tbody').html(response);
                $('#myTable tbody tr').each(function(){
                $(this).find('td:last').html('<button class="delete-row">Удалить</button><button class="edit-row">Редактировать</button>');
            });
            }
        });   
    }
    //спрашиваем подтверждение удаления пользователя
    $('#myTable tbody').on('click', 'button.delete-row', function() {
        var data = $('#myTable').DataTable().row($(this).parents('tr')).data();
        var id = data[0];
        var confirmation = confirm("Вы уверены, что хотите удалить пользователя " + data[3] + " " + data[4] + " " + data[5] + "?");
        if (confirmation) {
            $('#myTable').DataTable().row($(this).parents('tr')).remove().draw();
        }
    });
    //функция для удаления пользователя
    $(document).on("click", ".delete-row", function() {
        var row = $(this).closest("tr");
        var id = row.find("td:eq(0)").text();
        $.ajax({
            url: "../controllers/delete.php",
            method: "POST",
            data: { id: id },
            success: function() {
            row.remove();
            alert("Запись удалена");
            },
            error: function() {
            alert("Ошибка удаления записи");
            }
        });
    });
    //обновляем данные записи в таблице
    $('#editModal').on('submit', function(event) {
        event.preventDefault();
        var id = $('#editUserId').val();
        var login = $('#editLogin').val();
        var password = $('#editPassword').val();
        var surname = $('#editSurname').val();
        var name = $('#editName').val();
        var patronymic = $('#editPatronymic').val();
        $.ajax({
            url: "../functions/edit_user.php",
            method: "POST",
            data: {
            id: id,
            login: login,
            password: password,
            surname: surname,
            name: name,
            patronymic: patronymic
            },
            success: function() {
                alert("Запись обновлена!");
                $('#editModal').hide();
                updateTable();
            },
                error: function() {
                alert("Ошибка обновления записи!");
            }
        });
    });
    // функция для переноса данных из таблицы в форму редактирования
    function fillEditForm(data) {
        var row = $(data).closest("tr");
        var userId = row.find("td:first-child").text();
        var login = row.find("td:nth-child(2)").text();
        var password = row.find("td:nth-child(3)").text();
        var surname = row.find("td:nth-child(4)").text();
        var name = row.find("td:nth-child(5)").text();
        var patronymic = row.find("td:nth-child(6)").text();
        $("#editUserId").val(userId);
        $("#editLogin").val(login);
        $("#editPassword").val(password);
        $("#editSurname").val(surname);
        $("#editName").val(name);
        $("#editPatronymic").val(patronymic);
    }

    $(document).ready(function() {
        // при клике на кнопку редактирования заполняем форму данными из таблицы
        $("#myTable").on("click", ".edit-row", function() {
            fillEditForm($(this));
            $("#editModal").show();
        });

        // закрываем модальное окно редактирования при клике на крестик или вне формы
        $("#editModal").on("click", function(event) {
            if (event.target == this) {
                $(this).hide();
            }
        });
    });
</script>
<script>
    document.getElementById('openModalBtn').addEventListener('click', function(){
        document.getElementById('myModal').style.display = 'block';
    });

    document.getElementById('closeModalBtn').addEventListener('click', function(){
        document.getElementById('myModal').style.display = 'none';
    });
</script>
