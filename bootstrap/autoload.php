<?php
session_start();

spl_autoload_register(function ($className){
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className).'.php';
    if (file_exists($file)){
        require_once $file;
    }
});

