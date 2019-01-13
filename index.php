<?php

require('functions.php');
require 'templates/lot_list.php';
require('templates/functions.php');

date_default_timezone_set("Europe/Moscow");
$ts = time();
$secsInDay = 86400;
$tsMidnight = strtotime('tomorrow');
$secsToMidnight = $tsMidnight - $ts;
$hours = floor($secsToMidnight / 3600);
$minutes = floor(($secsToMidnight % 3600) / 60);
$timer = $hours . " : " . $minutes;
$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
$categories = [
    "Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"
];


$content = renderTemplate('templates/index.php', [
    'id' => $id,
    'categories' => $categories,
    'lots_list' => $lots_list,
    'timer' => $timer
]);
$layout_content = renderTemplate('templates/layout.php', [
    'main_title' => 'yetiCave',
    'categories' => $categories,
    'content' => $content,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
]);
print($layout_content);
?>