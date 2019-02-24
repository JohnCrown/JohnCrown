
    <?php var_dump($errors) ?>
    <form class="form form--add-lot container <?= count($errors) ?  " form--invalid" : ""; ?>" action="add.php" method="POST"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <?=isset($errors['lot_name']) ? 'form__item--invalid' : '';?>"> <!-- form__item--invalid -->
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot_name" placeholder="Введите наименование лота" >
            <span class="form__error"><?=$errors['lot_name'];?></span>
        </div>
        <div class="form__item <?=isset($errors['category']) ? 'form__item--invalid' : '';?>">
            <label for="category">Категория</label>
            <select id="category" name="category">
                <option>Выберите категорию</option>
                <option>Доски и лыжи</option>
                <option>Крепления</option>
                <option>Ботинки</option>
                <option>Одежда</option>
                <option>Инструменты</option>
                <option>Разное</option>
            </select>
            <span class="form__error"><?=$errors['category'];?></span>
        </div>
    </div>
    <div class="form__item form__item--wide">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота" ></textarea>
        <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" name="lot_file" type="file" id="lot-img" value="">
            <label for="lot_img">
                <span>+ Добавить</span>
            </label>
        </div>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small <?=isset($errors['lot_rate']) ? 'form__item--invalid' : '';?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot_rate" placeholder="0" >
            <span class="form__error"><?=$errors['lot_rate'];?></span>
        </div>
        <div class="form__item form__item--small <?=isset($errors['lot_step']) ? 'form__item--invalid' : '';?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot_step" placeholder="0" >
            <span class="form__error"><?=$errors['lot_step'];?></span>
        </div>
        <div class="form__item <?=isset($errors['lot_date']) ? 'form__item--invalid' : '';?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot_date" >
            <span class="form__error"><?=$errors['lot_date'];?></span>
        </div>
    </div>
        <span class="<?= count($errors) ? ' form__error form__error--bottom' : ''; ?>">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>

