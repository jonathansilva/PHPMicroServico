<?php

function autoload($class) {
    if (!defined('PHP_WINDOWS_VERSION_MAJOR')) {
        $class = str_replace("\\", "/", $class);
    }

    // list comma separated directory name
    $directory = array('../src/');

    // list of comma separated file format
    $fileFormat = array('%s.php');

    foreach ($directory as $current_dir)
    {
        foreach ($fileFormat as $current_format)
        {
            $path = $current_dir.sprintf($current_format, $class);

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
