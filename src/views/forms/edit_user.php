<div id="editModal" class="modal popup-bg">
    <div id="createUserModalContent" class="popup">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2" style="margin: auto;">Редактировать пользователя</h1>
            <button id="closeModalBtn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5 pt-0">
            <form id="editForm" action="edit_user.php" method="post">
                <div class="form-floating mb-3">
                    <input type="hidden" id="editUserId" name="id" value="">
                    <input type="text" id="editLogin" name="login" value="" class="form-control rounded-3" placeholder="Логин">
                    <label for="editLogin">Логин</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" id="editPassword" name="password" value="" class="form-control rounded-3" placeholder="Пароль">
                    <label for="editPassword">Пароль</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="editSurname" name="surname" value="" class="form-control rounded-3" placeholder="Фамилия">
                    <label for="editSurname">Фамилия</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="editName" name="name_user" value="" class="form-control rounded-3" placeholder="Имя">
                    <label for="editName">Имя</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="editPatronymic" name="patronymic" value="" class="form-control rounded-3" placeholder="Отчество">
                    <label for="editPatronymic">Отчество</label>
                </div>
                <div class="form-floating mb-3">
                <button id="edit_users" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Редактировать запись</button>
                </div>
            </form>
        </div>
    </div>
</div>