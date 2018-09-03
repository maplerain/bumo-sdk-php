<?php
require_once "src/crypto/protobuf/vendor/autoload.php";

function classLoader($class)
{
    $class = str_replace("bumo", "", $class);
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'src'. DIRECTORY_SEPARATOR . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('classLoader');