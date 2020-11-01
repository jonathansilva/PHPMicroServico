<?php
spl_autoload_register(function ($class) {
    $class=__DIR__.'/'.$class;
    if(!defined('PHP_WINDOWS_VERSION_MAJOR')){
        $class = str_replace("\\", "/", $class);
    }
    if (file_exists($class.'.php')) {
        include_once($class.'.php');
    }else{
        die('error:<br>'.$class.' not found');
    }
});
