<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/19
 * Time: 18:51
 */
class  index
{
    protected $fileArray = array();
    public function fileArray()
    {

        If (file_exists('app' . DIRECTORY_SEPARATOR . 'route.php')) {
            $route = 'app' . DIRECTORY_SEPARATOR . 'route.php';
            $fileArray['Http_File_Interface'] = $route;
            $this->fileArray=$fileArray;
        } else {
            die('缺失route文件');
        };
        if (!is_dir('controller')) {
            mkdir('controller', 0777);
        }
        if (!is_dir('model')) {
            mkdir('model', 0777);
        }
    }
//    function __autoload($class_name){
//        var_dump(111);
//        $path = str_replace('_', '/', $class_name);
//        require_once $path . '.php';
//    }
}
function __autoload($class_name){
    var_dump(111);
    $path = str_replace('_', '/', $class_name);
    echo($path . '.php');
    require_once $path . '.php';

}
$index=new app_route() ;
$index->route();