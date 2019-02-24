<form class="form container" action="login.php" method="post" enctype="application/x-www-form-urlencoded"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item <?=isset($errors['email']) ? 'form__item--invalid' : '';?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= $_POST['email'];?>">
        <span class="form__error"><?= isset($errors['email']) ? $errors['email'] : '';?></span>
    </div>
    <div class="form__item form__item--last <?=isset($errors['password']) ? 'form__item--invalid' : '';?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль">
        <span class="form__error"><?= isset($errors['password']) ? $errors['password'] : '';?></span>
    </div>
    <button type="submit" class="button">Войти</button>
</form>