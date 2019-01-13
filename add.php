<?php
require 'templates/functions.php';
$categories = [
    "Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"
];
$content = renderTemplate('templates/add-index.php', []);
$layout = renderTemplate('templates/layout.php', [
    'main_title' => 'Добавление лота - добавь, продай, радуйся',
    'content' => $content,
    'categories' => $categories
]);
print($layout);
?>