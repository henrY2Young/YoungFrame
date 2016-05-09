<?php
/**
 * Created by PhpStorm.
 * User: Administrator：HenryZhang
 * Date: 2016/3/31
 * Time: 8:23
 */
interface  delete1{
    function delete();
    function  deletebyId($id);


}
interface  update1{
    function  update_array(array $arr);
//    function
    function update($data,$where);
}
interface  insert1{
    function insert(array $arr);


}
interface  select2{
    function  get_all();//获取数据库全部信息
    function  get_one($where);//获取一条信息
    function  get_field();//获取一个字段的信息
    function  select();//选择
    function  findbyId($id);//根据id条件查询
}
class db123{

    function __construct()
    {
        $connect= new PDO("mysql:host=localhost;dbname=yaf","root","");

        return $connect;
    }
    function  exec_sql($sql){
        $conn= $this->__construct();
        return  $arr=$conn->query($sql);
    }
    function  query_sql($sql){
        $conn= $this->__construct();
        return  $arr=$conn->query($sql);
        $result=array();
        foreach($arr as $v){
            $result[]=$v;
        }
//        return $conn->getError();
        return $result;
    }
}
class pdotest1 extends db123 implements  select2,insert1,update1,delete1{
    private $password='';
    private $tablename="";
    private $where="";
    private $limit="";
    private $field="";
    private $order="";
    private $connect;
    function __construct()
    {
     return   parent::__construct();
    }
    function  where($where)
    {  $this->where="where  ".$where;
        // TODO: Implement where() method.
        return $this;
    }
    function  tablename($tabname)
    {
        $this->tablename=" ".$tabname;
        // TODO: Implement db() method.
        return $this;
    }
    function  limit($limit,$end=" ")
    {
        // TODO: Implement limit() method.
        if($end==" "){
        $this->limit=" limit 0,".$limit;
        }
        else{
            $this->limit=" limit $limit,$end";
        }
        return $this;

    }
    function  field($filed)
   {
       $this->field=$filed;
       return $this;
       // TODO: Implement field() method.
   }
    function  order($field, $oder)
  {  $this->order="order by $field  $oder";
      // TODO: Implement order() method.
      return $this;
  }
    function  select()
  {
//      $this->db1("user");
      // TODO: Implement sele() method.
      $conn= $this->__construct();
     $tabelname=($this->tablename);
      $where=$this->where;
        $limit=$this->limit;
        $field=$this->field;
        $order=$this->order;

        if($field==""){
            $sql="select * from $tabelname $where $order $limit";
        }
        else{
         $sql="select $field $tabelname $where $order  $limit";
        }
     return  parent::query_sql($sql);
//     $arr=$conn->query($sql);
//        $result=array();
//        foreach($arr as $v){
//            $result[]=$v;
////  echo $v['username'];
//        }
//        return $result;

  }
    function  get_all()
    {
//    $conn= $this->__construct();
//        $aa=$this->db1('user');
//        var_dump($aa);

//        // TODO: Implement get_all() method.
        $tbname=$this->tablename;
////        $connect=new PDO($this->host,$this->username,$this->password,$this->dbname);
       $sql="select *  from $tbname";
        echo $sql;
//        $conn= new PDO("mysql:host=localhost;dbname=yaf","root","");
        $conn= $this->__construct();
        $arr=$conn->query($sql);
        $result=array();
        foreach($arr as $v){
            $result[]=$v;
            var_dump( $v);
        }
//        return $conn->getError();
        return $result ;
// return parent::query_sql($sql);
    }
    function  get_field()
   {
       // TODO: Implement get_field() method.
       $field=$this->field;
       $taname=$this->tablename;
       $sql="select  $field  from  $taname";
       echo $sql;
     return  parent::query_sql($sql);
   }
    function  get_one($where)
 {
     // TODO: Implement get_one() method.

     $tbname=$this->tablename;
//     $where=$this->where;
     $sql="select * from $tbname where  $where";
     echo $sql;
  return  parent::query_sql($sql);

 }
    function  findbyId($id)
    {
        // TODO: Implement findbyId() method.
        $tabelname=$this->tablename;
        $sql="select * from   $tabelname where id=$id";
        return parent::query_sql($sql);
    }
    function insert(array $arr)
    {
        $len=count($arr);
        $value1=array();
        foreach($arr as $k=>$v){
            $value1[]=$k;
            $value2[]=$v;
        }
        $filed="";
        $filed1="";
        for ($i=$len-1;$i>=0;$i--){
       $filed=$value1[$i].','.$filed;
        }
        for ($i=$len-1;$i>=0;$i--){
            $filed1="'".$value2[$i]."'".','.$filed1;

        }
//        echo $filed1;
        $value3=substr($filed,0,(strlen($filed)-1));
        $value4= substr($filed1,0,(strlen($filed1)-1));
//        echo $value4;
        var_dump($value1);
        var_dump($value2);
        $tabname=$this->tablename;
        $sql="insert into $tabname ($value3) values($value4)";
        if(!parent::exec_sql($sql)){
            echo "insert error";
        }
        else{
            echo "ok";
        }

    }
    function update_array(array $arr){
        $len=count($arr);
    }
    function update($data,$where){
        $tbname=$this->tablename;
        $sql="update $tbname set $data where $where";

       if(!parent::exec_sql($sql)){
           echo  "updaa error";

       }
        else{

            echo  "ok";
        };
    }
    function deletebyId($id){
        $tbname=$this->tablename;
        $sql="delete from $tbname where id=$id";
        if(!parent::exec_sql($sql)){
            echo  " deletebyId error";

        }else{
            echo "deletebyId ok";
        }

    }
    function  delete()
    {
        $tbname=$this->tablename;
    echo $tbname;
        $where=$this->where;
        $sql="delete from $tbname $where";
        echo $sql;
        if(!parent::exec_sql($sql)){
            echo "delect error";
        }else{
            echo "delete ok";
        }
    }
}
//echo "123";
//$connect= new PDO("mysql:host=localhost;dbname=yaf","root","");
////$result=$connect->query("insert into user (username,password) VALUES  ('2123','123')");
//$result=$connect->query("select * from user");
//foreach($result as $v){
//
//  echo $v['username'];
//}
//var_dump($result);
$pdo=new pdotest1();
var_dump($pdo->tablename('user')->get_all());
//$aa=$pdo->tablename("user")->select();var_dump($aa);
//$getall=$pdo->tablename('user')->get_all();
//$getont=$pdo->field("username")->tablename("user")->get_field();
//$findbyId=$pdo->tablename('user')->findbyId('3719');
//var_dump($pdo->tablename("user")->select());

//$ar=array();
//
//$ar['username']="2";
//$ar['password']="3";
//$insert=$pdo->tablename(user)->insert($ar);
////$delete=$pdo->tablename('user')->where('id=1')->delete();
//$delet=$pdo->tablename("user")->deletebyId('2');
//var_dump($delet);