<div class="menu">
    <?if (!$isAuth):?>
        <a href="/register/">
            <button class="btn btn-success">Регистрация</button>
        </a>
        <a href="/login/">
            <button class="btn btn-success">Вход</button>
        </a>
    <?else:?>
        <a href="/logout/">
            <button class="btn btn-success">Выход</button>
        </a>
    <?endif;?>
    <a href="/">
        <button class="btn btn-warning btn-profile">Главная</button>
    </a>
</div>
<div class="register">
    <div class="register__form">
        <form action="/login/" method="post">
            <div class="register__title">
                Вход
            </div>
            <div class="register__atr">
                <div class="register__atr-name">Email</div>
                <input type="email" name="email" required>
            </div>
            <div class="register__atr">
                <div class="register__atr-name">Пароль</div>
                <input type="password" name="password" required>
            </div>
            <button class="btn btn-success btn__register">Войти</button>
        </form>
    </div>
</div>