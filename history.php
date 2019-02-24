<?php
require  'templates/functions.php';
require  'functions.php';
//require   'templates/lots_list.php';
session_start();
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
    "Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"
];
$viewed_lots_id = json_decode($_COOKIE['viewed_lots'], true);
$content = renderTemplate('templates/history-index.php', [
    'viewed_lots_id' => $viewed_lots_id,
    'id' => $id,
    'lots_title' => 'Просмотренные лоты',
    'categories' => $categories,
    'lots_list' => $lots_list,
    'timer' => $timer,
]);
$nav = renderTemplate('templates/nav.php', [
    'categories' => $categories
]);
$layout_content = renderTemplate('templates/layout.php', [
    'nav' => $nav,
    'main_title' => 'История просмотров',
    'categories' => $categories,
    'content' => $content,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
]);
print($layout_content);
?>