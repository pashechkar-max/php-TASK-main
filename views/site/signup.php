<div class="card">

    <div><h2>Регистрация</h2></div>

<h3><?= $message ?? ''; ?></h3>
<form method="post">
<!--    <input name="csrf_token" type="hidden" value="--><?php //= app()->auth::generateCSRF() ?><!--"/>-->
    <label>Фамилия <input type="text" name="surname"></label>
    <label>Имя <input type="text" name="name"></label>
    <label>Отчество<input type="text" name="patronymic"></label>
    <label>Дата рождения <input type="date" name="birth_date"></label>
    <label>Почта <input type="email" name="email"></label>
    <label>Логин <input type="text" name="login"></label>
    <label>Пароль <input type="password" name="password"></label>
    <button class="btn save in">Зарегистрироваться</button>
</form>
</div>
