<!-- Модальное окно -->
<div id="myModal" class="modal">

    <!-- Модальное содержание -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Регистрация</h2>
        </div>
        <div class="modal-body">
            <form action="php/reg.php" method="post" class="form" id="add-form">
                <div class="input-box">
                    <input type="text" name="surname" class="log_input" placeholder="Фамилия" required>
                    <input type="text" name="name" class="log_input" placeholder="Имя" required>
                    <input type="text" name="patron" class="log_input" placeholder="Отчество" required>
                    <input type="text" name="post" class="log_input" placeholder="Должность" required>
                    <input type="text" name="tel" class="log_input" placeholder="Телефон" required>
                    <input type="text" name="mail" class="log_input" placeholder="E-mail" required>
                    <input type="text" name="city" class="log_input" placeholder="Город" required>
                    <input type="text" name="street" class="log_input" placeholder="Улица" required>
                    <input type="text" name="house" class="log_input" placeholder="Дом" required>
                    <input type="text" name="apart" class="log_input" placeholder="Квартира" required>
                    <input type="text" name="login" class="log_input" placeholder="Логин" required>
                    <input type="password" name="pass" class="log_input" placeholder="Пароль" required>
                    <input type="password" name="P_pas" class="log_input" placeholder="Подтверждение пароля" required>
                </div>
                <div class="log_butt"><!-- required      onsubmit="return false;"-->
                    <button type="submit" class="log_butt_l log">Зарегистрировать</button>
                </div>
            </form>
        </div>
        <script defer src="/js/ind_mod_auth.js"></script>
    </div>

</div>