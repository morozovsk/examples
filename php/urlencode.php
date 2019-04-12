<?php

$novalidUrl = 'https://site.com/ru-ru/сильный-характер/xx-xxx122?ref=qwe';

// $validUrl = 'https://site.com/ru-ru/%D1%81%D0%B8%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9-%D1%85%D0%B0%D1%80%D0%B0%D0%BA%D1%82%D0%B5%D1%80/xx-xxx122?ref=qwe';
$validUrl = preg_replace_callback('/[^\x20-\x7f]/', function($match) { return urlencode($match[0]);}, $url);
// \x20 (space) - \x7E (~)

// another variant
/*$path = parse_url($url, PHP_URL_PATH);
if (strpos($path,'%') === false) {
    $validUrl = str_replace($path, implode('/', array_map('urlencode', explode('/', $path))), $url);
}*/
