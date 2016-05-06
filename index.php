<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/4
 * Time: 15:48
 */
define("ROUTE","route");
class index {

//    function  __construct()
//    {
//        $this->__autoload();
//    }

    function  __autoload($className) {
        $filePath =dirname(__DIR__)."\\test"."\\"."$className.php";

        if (is_file($filePath)) {
            require($filePath);
//            echo $filePath;
        }
    }

function  run()
{
//    ins
//    echo dirname(__DIR__)."\\test";
    $this->__autoload("route");
//          $this->__autoload("                      ");
    $route = new route();
//    spl_autoload_register('__autoload');
//    $route->
//    var_dump(__CLASS__);
}

}
$app=new index();
$app->run();
//$app->run();
//$route=new route();$route->route();

//parent::routeclass