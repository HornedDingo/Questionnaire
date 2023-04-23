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

<script>
    document.getElementById('openModalBtn').addEventListener('click', function(){
        document.getElementById('myModal').style.display = 'block';
    });

    document.getElementById('closeModalBtn').addEventListener('click', function(){
        document.getElementById('myModal').style.display = 'none';
    });
</script>