<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {

    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (strpos($url, 'include') !== false) {

        $path = '../php/class/class_';

    }

    else {
        $path = 'php/class/class_';
    }

    $extension = '.php';
    
    require_once $path . $className . $extension;

}