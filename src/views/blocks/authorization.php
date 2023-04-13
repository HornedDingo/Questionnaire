<div id="myModal" style="display:none;" class="popup-bg">
    <div id="myModalContent" class="popup">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2" style="margin: auto;">Авторизация</h1>
            <button id="closeModalBtn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5 pt-0">
            <form action="">
            <div class="form-floating mb-3">
                <input id="login" type="textarea" class="form-control rounded-3" id="floatingInput" placeholder="Логин">
                <label for="floatingInput">Логин</label>
            </div>
            <div class="form-floating mb-3">
                <input id="pass" type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Пароль">
                <label for="floatingPassword">Пароль</label>
            </div>
            <div class="form-floating mb-3">
                <p id="fail"> Здесь будет ошибка</p>
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Войти</button>
            <small class="text-body-secondary">Нажимая кнопку "Войти", вы соглашаетесь с условиями пользования</small>
            </form>
        </div>
    </div>
</div>