<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <label>Полное имя <input type="text" name="full_name"></label>
    <label>Логин <input type="text" name="login"></label>
    <label>Пароль <input type="password" name="password"></label>
    <button>Зарегистрироваться</button>
</form>
