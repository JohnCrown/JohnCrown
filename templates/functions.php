<?php
function renderTemplate($templatePath, $templateData = []) {
    $content = '';
    extract($templateData);
    if (file_exists($templatePath)) {
        ob_start();
        require($templatePath);
        $content = ob_get_contents();
        ob_end_clean();
    }
    return $content;
}
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

?>