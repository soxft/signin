<?php
require_once('ip.php');
$time = time();
$conn = mysqli_connect("localhost","qd","qdqdqd","qd");
$passwd = $_GET['p'];
if ($passwd == "tzgjzxtj") {
  //主体
  $i = 0;
  //未签到人数初始化
  $j = 0;
  //总人数初始化
  $name = array();
  //未签到人名数组初始化  完了，学完c++，php的数组不会写了
  $sql = "SELECT * FROM `user`";
  $re = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_object($re)) {
    $id = $row->id;
    $j++;
    //已签到人数++
    if (empty($row->time)) {
      $i++;
      //为签到人数++
      $name[] = $row->name;
    }
    $sqlx = "update `user` SET time = '' , ip='' where id ='$id'";
    @mysqli_query($conn,$sqlx);
    //删除记录
  }

  $z = $j -$i;
  //计算已签到人数;
  //print_r($name);
  //$lenth = count($name);  //脑残，数组长度不就等于为签到人数吗，，笑死我了哈哈哈笑自己
  for ($q = 0;$q <= $i - 1;$q++) {
    $nameall .= $name[$q];
    if ($q !== $i-1) {
      $nameall .= "<br />";
      //防止最后多插入一个都逗号
    }
  }
  //echo $nameall;
  $timex = date("H");
  if ($timex <= 8) {
    $timec = date("m月d日",strtotime("-1 day"));
    $times = "晚";
  } elseif ($timex < 14) {
    $timec = date("m月d日");
    $times = "早";
  } else {
    $timec = date("m月d日");
    $times = "午";
  }
  $record = "INSERT INTO `history` VALUES('$time','$timec','$times','$z','$i','$nameall');";
  $up = mysqli_query($conn,$record);
  //记录至历史表
  echo "<h1>成功!</h1>";
  @$log = "INSERT INTO `log` VALUES('del','成功','$ip','$time')";
  @mysqli_query($conn,$log);
  //日志
} else {
  echo "<h1>密码错误!!</h1>";
  @$log = "INSERT INTO `log` VALUES('del','失败','$ip','$time')";
  @mysqli_query($conn,$log);
  //日志
}
?>