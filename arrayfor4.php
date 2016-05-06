<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/3
 * Time: 11:08
 */
$a=array('1'=>array(2=>array(3=>array(1,2,3))),'2'=>array(2=>array(3=>array(1,2,3))),'3'=>array(2=>array(3=>array(1,2,3))));
//print_r($a);
var_dump($a[1]);
foreach($a as $v){
var_dump($v[2]);


}
function ff($a){
    foreach($a as $arr){

if(is_array($arr)){

    ff($arr);

}else{
    echo $arr;

}

    }



}
ff($a);