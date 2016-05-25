<?php
error_reporting(0);
date_default_timezone_set("Asia/Shanghai");
  class route {


public  function route(){
$_DocumentPath = $_SERVER['DOCUMENT_ROOT'];
$_RequestUri = $_SERVER['REQUEST_URI'];
//echo $_RequestUri;
$_UrlPath = $_RequestUri;
$_FilePath = __FILE__;
$_AppPath = str_replace($_DocumentPath, '', $_FilePath);    //==>routerindex.php

$_AppPathArr = explode(DIRECTORY_SEPARATOR, $_AppPath);
//var_dump( $_AppPathArr);
for ($i = 0; $i < count($_AppPathArr); $i++) {
    $p = $_AppPathArr[$i];
//    echo $p;
    if ($p) {
        $_UrlPath = preg_replace('/^/'.$p.'//', '/', $_UrlPath, 1);
    }
}
$_UrlPath = preg_replace('/^//', '', $_UrlPath, 1);
 
 
//$_AppPathArr = explode("/", $_UrlPath);
$_AppPathArr = explode("/", $_RequestUri);
//var_dump($_AppPathArr);
$_AppPathArr_Count = count($_AppPathArr);
$arr_url = array(
    'controller' => "index/index",
    'method' => "index",
    'parms' => array()
);
//    var_dump($arr_url);
$arr_url['controller'] = $_AppPathArr[3];
$arr_url['method'] = $_AppPathArr[4];


if ($_AppPathArr_Count > 2 and $_AppPathArr_Count % 2 != 0) {
    die('参数错误');
//    $arr_url = array(
//        'controller' => "index",
//        'method' => "index",
//        'parms' => array()
//    );
} else {
    for ($i = 4; $i < $_AppPathArr_Count; $i += 2) {
        $arr_temp_hash = array(strtolower($_AppPathArr[$i])=>$_AppPathArr[$i + 1]);
        $arr_url['parms'] = array_merge($arr_url['parms'], $arr_temp_hash);
    }
}
$module_name = $arr_url['controller'];
//var_dump($arr_url);
    $module_name=$module_name."Controller";
$module_file = 'controller/'.$module_name.'.class.php';
echo $module_file;
$method_name = $arr_url['method'];
if (file_exists($module_file)) {

    include $module_file;
    $obj_module = new $module_name();

//    echo "123";
//    $method_name=$method_name."Controller";
//    var_dump($method_name);
    if (!method_exists($obj_module, $method_name)) {

        die("要调用的方法不存在");

    } else {echo qqq.$module_file;
//        $obj_module="view/".$obj_module;
//        echo "123111";
        if (is_callable(array($obj_module, $method_name))) {
//            echo $module_name;

//            var_dump($arr_url['parms']);
            $obj_module -> $method_name($arr_url['parms']);
//            $obj_module -> printResult();
//            echo "123111";
        }
//        echo qqq.$module_file;
    }
} else {
    die("定义的模块不存在");
}

}}
//route();
?>