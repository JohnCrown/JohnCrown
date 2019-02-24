<?php
require 'templates/functions.php';
//require 'templates/lots_list.php';
require 'functions.php';
session_start();
//$categories = [
//    "Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"
//];

if (isset($_SESSION['user'])) {
    $is_auth = true;
    $user_name = $_SESSION['user']['name'];
    $user_avatar = $_SESSION['user']['avatar'] ? 'img/uploads/users/' . $_SESSION['user']['avatar']: 'img/user.jpg';
} else {
    http_response_code(403);
    $page_content = renderTemplate('templates/add_403.php', []);
    $layout_content = renderTemplate('templates/layout.php', [
        'main_title' => $page_title,
        'categories' => $categories,
        'content' => $page_content
    ]);
    print($layout_content);
    exit(0);
}


$categories = [
    'boards_skis' => 'Доски и лыжи',
    'mountings' => 'Крепления',
    'boots' => 'Ботинки',
    'clothes' => 'Одежда',
    'instruments' => 'Инструменты',
    'other' => 'Разное'
];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;
    $required = [
        'lot_name',
        'lot_rate',
        'lot_step',
        'lot_date',
        'category_name',
        'message'
    ];
    $dict = [
        'lot_name' => 'Название лота',
        'lot_rate' => 'Начальная цена',
        'lot_step' => 'Шаг ставки',
        'lot_date' => 'Дата окончания торгов',
        'category_name' => 'Категория',
        'message' => 'Описание лота'
    ];
    $errors = [];
    foreach ($required as $field) {
        if ($_POST['category_name'] == 'standard_category') {
            $errors['category_name'] = 'Заполните это поле:';
        }
        if (empty($_POST[$field])) {
            $errors[$field] = 'Заполните это поле:';
        }
    }
    if (isset($_FILES['lot_file'])) {
        $tmp_name = $_FILES['lot_file']['tmp_name'];
        $file_path = __DIR__ . '\uploads\\img\\';
        $file_name = $_FILES['lot_file']['name'];
        $file_url = $file_path . $file_name;
        if (!empty($tmp_name)) {
            $file_info = finfo_open(FILEINFO_MIME_TYPE);
            $file_type = finfo_file($file_info, $tmp_name);
        }
        if (!($file_type === "image/gif" || $file_type === "image/png" || $file_type === "image/jpeg" || $file_type === "image/jpg")) {
            $errors['lot_file'] = 'Загрузите картинку в формате на выбор: 	png, jpg, gif';
        } else {
            move_uploaded_file($tmp_name, $file_url);
            $lot['path'] = $file_name;
        }
    }
    else {
        $errors['lot_file'] = "Вы не загрузили файл";
    }
    if (!is_numeric($_POST['lot_rate'])) {
        $errors['lot_rate'] = "Введите начальную цену";
    }
    if (!is_numeric($_POST['lot_step'])) {
        $errors['lot_step'] = "Введите шаг ставки";
    }
    if (count($errors)) {
        $content = renderTemplate('templates/add-index.php', [
            'categories' => $categories,
            'errors' => $errors,
            'dict' => $dict
        ]);
    }
    else {
        $content = renderTemplate('templates/lot_index.php', [
            'is_auth' => $is_auth,
            'lot' => $lot,
            'categories' => $categories,
            'title' => $lot['lot_name'],
            'category_name' => $categories[$lot['category_name']] ,
            'price' => $lot['lot_rate'],
            'lot_description' => $lot['message'],
            'url' => '\uploads\\img\\' . $file_name
        ]);
    }
}
else {
    $content = renderTemplate('templates/add-index.php', [
        'dict' => $dict,
        'categories' => $categories
    ]);
}
$layout = renderTemplate('templates/layout.php', [
    'content' => $content,
    'categories' => $categories,
    'main_title' => 'yetiCave - добавить новый лот',
    'is_auth' => $is_auth,
    'user_name' => $_SESSION['user']['name'],
    'user_avatar' => $user_avatar,
]);
print($layout);
?>