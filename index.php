<?php

require('functions.php');
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
function format_text($number) {
    if ($number > 1000) $number = ceil($number);
    $min_length_string = 3;
    $num = mb_strlen($number);
    if ($num > $min_length_string) {
        $firstText = mb_substr($number, $num - 3, $min_length_string);
        $secondText = mb_substr($number, 0, $num - $min_length_string);
        $number = $secondText . " " .  $firstText . " ₽";
    };
    return $number;
}
$lots_list = [
    [
        'title' => '2014 Rossignol District Snowboard',
        'category_name' => 'Доски и лыжи',
        'price' => '10999',
        'url' => 'img/lot-1.jpg'
    ],
    [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'category_name' => 'Доски и лыжи',
        'price' => '159999',
        'url' => 'img/lot-2.jpg'
    ],
    [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category_name' => 'Крепления',
        'price' => '8000',
        'url' => 'img/lot-3.jpg'
    ],
    [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category_name' => 'Ботинки',
        'price' => '10999',
        'url' => 'img/lot-4.jpg'
    ],
    [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category_name' => 'Одежда',
        'price' => '7500',
        'url' => 'img/lot-5.jpg'
    ],
    [
        'title' => 'Маска Oakley Canopy',
        'category_name' => 'Разное',
        'price' => '5400',
        'url' => 'img/lot-6.jpg'
    ],
];
$content = renderTemplate('templates/index.php', [
    'categories' => $categories,
    'lots_list' => $lots_list,
    'timer' => $timer
]);
$layout_content = renderTemplate('templates/layout.php', [
    'main_title' => 'Auction',
    'categories' => $categories,
    'content' => $content,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
]);
print($layout_content);
?>