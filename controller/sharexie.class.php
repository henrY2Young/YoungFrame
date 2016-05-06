<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/3
 * Time: 13:29
 */
class sharexie{
    function test($b){

        var_dump($b);
        $b=array("a"=>"1","b"=>"2");
       $this-> assign("aa.php",$b);
        echo "this is  aa.php";

    }
static  function  assign( $name,$v){
    $a=$v;
    $dir="view/";
 include($dir."aa.php");


}

}