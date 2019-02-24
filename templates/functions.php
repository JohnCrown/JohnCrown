<?php

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
};
function searchUserByEmail($postEmail, $users) {
    foreach ($users as $user) {
        if ($user['email'] == $postEmail) {
            return $user;
        }
    }
    if (empty($user)) {
        return false;
    }
}


?>