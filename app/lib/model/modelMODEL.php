<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/5
 * Time: 16:23
 */




class modelMODEL
{  public $tablename=__CLASS__;
    public  $rule=array();

// public $tablename1=__CLASS__;
    public function  tablename(){
//     echo __METHOD__;
//        echo $this->tablename=$tablenam;
      echo   $tablename=substr($this->tablename,0,-5);
//     $this->tablename1=   $tablename;
        return $tablename;

    }
// public  function  getTabelname(){
// echo     $this->tablename(__CLASS__);
//
// }

}
//public  function  tablename(){
////     echo __METHOD__;
////        $tablename=substr(__CLASS__,0,-5);
////     $this->tablename1=   $tablename;
//    return $this->tablename1;
//
//}