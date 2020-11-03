<?php

function autoload($class) {
    if (!defined('PHP_WINDOWS_VERSION_MAJOR')) {
        $class = str_replace("\\", "/", $class);
    }

    $dir = array('../src/');
    $extension = array('%s.php');

    foreach ($dir as $current_dir)
    {
        foreach ($extension as $current_extension)
        {
            $path = $current_dir.sprintf($current_extension, $class);

            if (!file_exists($path)) {
                die('Error: '.$path.' not found');
                //throw new Exception('Error: '.$class.' not found');
            }

            include_once $path;

            return;
        }
    }
}

spl_autoload_register('autoload');
