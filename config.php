<?php

if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
    $protocol = ($_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';;
    $host = $_SERVER['HTTP_HOST'];
} else {
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
    $host = $_SERVER['HTTP_HOST'];
}

$url = $protocol . $host . '/';

define('BASE_URL', $url);
define('TITLE', 'Bolsa - Api');

define("API_KEY", "4710ad9c");

if(!function_exists('css')){
    function css($css = null, $rel = 'stylesheet', $type = 'css'){
        return '<link rel="' . $rel . '" type="text/' . $type . '" href="' . BASE_URL . "app/".  $css . '.css">' . "\n";
    }
}

if(!function_exists('js')){
    function js($js = null, $type = 'javascript'){
        return '<script type="text/' . $type . '" src="'. BASE_URL . "app/". $js .'.js"></script>' . "\n";
    }
}