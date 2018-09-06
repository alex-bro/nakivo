<?php
if (!defined('ABSPATH')) exit;
function abvNakivoAutoLoader($className){
    if(strpos($className,'nakivo\\')=== false){
        $path = __DIR__.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.$className.'.php';
    } else {
        $path = __DIR__.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.explode("\\",$className)[1].'.php';
    }

    if(file_exists($path)){
        require ($path);
    }
}
spl_autoload_register('abvNakivoAutoLoader');