<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/5
 * Time: 15:37
 */
//namespace app\lib\model;



//require_once("../app/lib/model/modelMODEL.php");

class userModel  {
//    public  $tablename;
//   public  function  tablename(){
//    echo   parent::tablename() ;//getTabelname
//
////return
//   }

    public $tablenam=__CLASS__;
    public  $rule=array();

// public $tablename1=__CLASS__;
//    public function  tablename(){
////     echo __METHOD__;
//        echo $this->tablenam;
//        echo   $tablename=substr($this->tablenam,0,-5);
////     $this->tablename1=   $tablename;
////        return $tablename;
//
//    }
}
$u= new userModel();
echo $u->tablename();