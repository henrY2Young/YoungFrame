<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/29
 * Time: 19:31
 */
//define(EXTEND,'php');

define('EXTEND_PHP', '.php');
//class IndexController{
//
//}
class  app_route
{

    protected  $method;
    protected $params=[];
    public function getAppPath(){
        $_DocumentPath = $_SERVER['DOCUMENT_ROOT'];
        $_RequestUri = $_SERVER['REQUEST_URI'];
        $_UrlPath = $_RequestUri;
        $_filePath = __FILE__;
        $_AppPath = str_replace($_DocumentPath, '', $_filePath);
        return $_AppPathArr = explode("/", $_RequestUri);
    }
    public  function urlConfig(){
        return array(
            'controller' => "index/index",
            'method' => "index",
            'parms' => array()
        );
    }
    public  function getMethod($urlArray){
    if(!is_array($urlArray)){
        die('参数错误');
    }

    }
    public  function getParams($_AppPathArr, $arr_url){
       if(!is_array($_AppPathArr)) {die('参数错误');}
        $len=count($_AppPathArr);
        $arr_url['controller'] = $_AppPathArr[3];
        $arr_url['method'] = $_AppPathArr[4];
        for ($i = 5; $i < $len - 1; $i += 2) {
            $param = array($_AppPathArr[$i] => $_AppPathArr[$i + 1]);
            var_dump($param);
            $arr_url['parms'] = array_merge($arr_url['parms'], $param);
        }
          return $arr_url;
    }
    public  function getControllerName($arr_url){
         return  $controllerName = $className = $arr_url['controller'] . 'Controller';
    }
    public function route(){
        $_AppPathArr= $this->getAppPath();

        $_AppPathArrCount = count($_AppPathArr);
        $arr_url =$this->urlConfig();
        if ($_AppPathArrCount < 3) {
            die('参数错误');
        }
        if ($_AppPathArrCount == 3) {
            $arr_url['controller'] = 'index';
            $arr_url['method'] = 'index';
            $arr_url['parms'] = '';
        }
        if ($_AppPathArrCount > 3) {
            $arr_url=$this->getParams($_AppPathArr, $arr_url);
   var_dump($arr_url=$this->getParams($_AppPathArr, $arr_url));
        }
        $controllerName = $className = $arr_url['controller'] . 'Controller';
        $method = $arr_url['method'];
        $param = $arr_url['parms'];
        $controllerPath = 'controller/' . $arr_url['controller'] . 'Controller' . EXTEND_PHP;
        echo $controllerPath;
        if (!$this->fileExit($controllerPath)) {
            die('访问模块不存在');

        } else {
            include $controllerPath;
            if (!class_exists($className)) {
                die('class not exist');
            }
            $obj = new $className();
            if (!method_exists($obj, $method)) {
                die('方法不存在');
            }
            echo $method;
            var_dump($param);
            var_dump(is_callable(array($obj, $method)));
            if (!is_callable(array($obj, $method))) {
                die('函数参数错误');
            }
            $paramCount = count($param);
            echo '--------------------';
            $paramKey=array_keys($param);
            foreach ($paramKey as $key => $value) {
                # code...
                if(!is_string($value)){
                      echo $paramKey[$key].'参数错误===>参数应为字符';
                      die();
                }
            }
            echo '--------------------';
            $this->params=$param;
            $this->method=$method;
            $str='';
            foreach ( $param as $key=>$value){
                $str.='$'.$key.'='.$value.',';
            }
            call_user_func_array(array($obj,$this->method), $param);
        }
        var_dump($arr_url);
    }


    function otest (){
        var_dump(111);
        var_dump($this->method);
        var_dump(222);
        $args = func_get_args();
        $num = func_num_args();
        call_user_func_array( 'otest'.$num, $args );
    }
    public function fileExit($fileName)
    {
        if (!file_exists($fileName)) {
            return false;
        }
        return true;

    }
    function get_func_params($func)
    {
        $r = new ReflectionFunction($func);
        $str = $r->getDocComment();
        preg_match_all('/@param/',$str,$m);
        return count($m[0]);
    }

}

$route = new app_route();