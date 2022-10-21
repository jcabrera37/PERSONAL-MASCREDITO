 <?php


function loadLibraries($class){
    $path = __DIR__."/";
    require_once $path.$class.".php";
}

spl_autoload_register("loadLibraries");

?>