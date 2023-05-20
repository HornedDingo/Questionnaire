<div id="myModal" style="display:none;" class="popup-bg">
    <div id="myModalContent" class="popup">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2" style="margin: auto;">Авторизация</h1>
            <button id="closeModalBtn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5 pt-0">
            <form action="../../src/controllers/check_login.php" method="POST">
            <div class="form-floating mb-3">
                <input name="login" type="textarea" class="form-control rounded-3" placeholder="Логин" required>
                <label for="login">Логин</label>
            </div>
            <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control rounded-3" placeholder="Пароль" required>
                <label for="password">Пароль</label>
            </div>
            <div class="form-floating mb-3">
                <p id="fail"></p>
            </div>
            <button id="singin" name="submit" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Войти</button>
            <small class="text-body-secondary">Нажимая кнопку "Войти", вы соглашаетесь с условиями пользования</small>
            </form>
        </div>
    </div>
</div>