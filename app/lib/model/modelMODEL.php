<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/5
 * Time: 16:23
 */

namespace app\lib\model;


class modelMODEL
{


    public function  tablename(){
//     echo __METHOD__;
        $tablename=substr(__CLASS__,0,-5);
        return $tablename;

    }


}