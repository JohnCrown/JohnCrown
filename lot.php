<?php
require ('templates/lot_list.php');
require 'templates/functions.php';

if ($_GET['lot_id'] > count($lots_list)) {
    http_response_code(404);
    $content = renderTemplate('templates/404.php', []);
    print($content);
    exit(100);
};
$categories = [
    "Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"
];
$lot = null;
if (isset($_GET['lot_id'])) {
    $lot_id = $_GET['lot_id'];
    foreach ($lots_list as $key => $value) {
        if ($key == $lot_id) {
            $lot = $value;
            break;
        }
    }
}
$content = renderTemplate('templates/lot_index.php', [
    'lot' => $lot,
    'title' => $lot['title'],
    'category_name' => $lot['category_name'],
    'price' => $lot['price'],
    'url' => $lot['url']
]);
$layout_content = renderTemplate('templates/layout.php', [
    'main_title' => $lot['title'],
    'category_name' => $lot['category_name'],
    'content' => $content,
    'categories' => $categories
]);
print($layout_content);
?>

