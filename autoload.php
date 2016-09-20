<?php

function __autoload($class){
    if (file_exists(ROOT . '/controllers/' . $class . '.php')){
        require ROOT . '/controllers/' . $class . '.php';
    } elseif (file_exists(ROOT . '/models/' . $class . '.php')) {
        require ROOT . '/models/' . $class . '.php';
    }
}