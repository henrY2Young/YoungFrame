<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/4
 * Time: 15:48
 */
define("ROUTE","route");
require_once("app/lib/route/route.php");
define("Tablename",__CLASS__);
class index {


    function  __autoload($className) {
        $filePath =dirname(__DIR__)."\\test"."\\"."$className.php";

        if (is_file($filePath)) {
            require($filePath);

        }
    }

function  run()
{

    $this->__autoload("route");

    $route = new route();

}

}
$app=new index();
$app->run();
