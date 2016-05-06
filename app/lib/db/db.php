<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/4
 * Time: 16:54
 */
include ("../../config.php");
class db{
public    $dns,$usrname,$password,$dbname,$server;

function  __construct()
{
$a=new config();
    $arr=$a->config();
//    var_dump($a['DB_NAME']);
//    mysql:dbname=ent;host=127.0.0.1

    $this->dns=$arr["DNS"];
    $this->usrname=$arr["USERNAME"];
    $this->password=$arr["PASSWORD"];
    $this->dbname=$arr["DB_NAME"];
    $this->server="mysql:dbname=$this->dbname;host=$this->dns";
    echo($this->server);
    $pdo=new PDO($this->server,$this->usrname,$this->password);
    var_dump($pdo);
}
}
$db=new db();
//$db->__construct();

//$db->
