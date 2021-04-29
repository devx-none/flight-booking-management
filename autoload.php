<?php 
session_start();
spl_autoload_register('autoload');
function autoload($class_nam){
    $array_paths=array(
        'database/',
        'models/',
        'controllers/'
    );
    $parts = explode('\\',$class_nam);
    $name = array_pop($parts);
    foreach($array_paths as $paths){
        $file = sprintf($paths.'%s.php',$name);
        if(is_file($file)){
            include_once $file;
        }
    }
}

?>