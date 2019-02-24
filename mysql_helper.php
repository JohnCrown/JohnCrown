<?php

/**
 * Создает подготовленное выражение на основе готового SQL запроса и переданных данных
 *
 * @param $link mysqli Ресурс соединения
 * @param $sql string SQL запрос с плейсхолдерами вместо значений
 * @param array $data Данные для вставки на место плейсхолдеров
 *
 * @return mysqli_stmt Подготовленное выражение
 */
function db_get_prepare_stmt($link, $sql, $data = []) {
    $stmt = mysqli_prepare($link, $sql);

    if ($data) {
        $types = '';
        $stmt_data = [];

        foreach ($data as $value) {
            $type = null;

            if (is_int($value)) {
                $type = 'i';
            }
            else if (is_string($value)) {
                $type = 's';
            }
            else if (is_double($value)) {
                $type = 'd';
            }

            if ($type) {
                $types .= $type;
                $stmt_data[] = $value;
            }
        }

        $values = array_merge([$stmt, $types], $stmt_data);

        $func = 'mysqli_stmt_bind_param';
        $func(...$values);
    }

    return $stmt;
}
$con = mysqli_connect("localhost", "root", "", "yeti_cave");
if ($con = false) {
    print("Ошибка подключения: " . mysqli_connect_error());
} else {
    print("Соединение установлено");
}
// Запись в базу
$sql = "INSERT INTO users SET email = 'jasonstealer@ya.ru', password = 'secret'";
$result = mysqli_query($con, $sql);
if (!$result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
} else {
    $last_id = mysqli_insert_id($con);
}
$sql = "SELECT category_id, category_name FROM categories";
$result = mysqli_query($con, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($rows as $row) {
    print("Категория: " . $row['name']);
}