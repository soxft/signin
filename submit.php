<?php
require_once('ip.php');
$time = time();
$conn = mysqli_connect("localhost","qd","qdqdqd","qd");


  $name = trim($_POST['name']);   //去除左右空格
  $sql = "SELECT * FROM `user` where name = '$name'";
  $re = mysqli_query($conn,$sql);
  $arr = mysqli_fetch_assoc($re);
  
  if (empty($arr['name'])) {
    echo "姓名为空或非本班同学!";
    if (!empty($name)) {
      @$log = "INSERT INTO `log` VALUES('非本班同学','$name','$ip','$time')";
      @mysqli_query($conn,$log);
      //日志
    }
    exit();
    }
  //本班同学检测
  
  if (!empty($arr['time'])) {
    echo "您已经签过到了";
    @$log = "INSERT INTO `log` VALUES('重复签到','$name','$ip','$time')";
    @mysqli_query($conn,$log);
    //日志

    exit();
  }
  $timex = date("Hi");
  if(($timex>="650"&&$timex<"710") || ($timex>="1320"&&$timex<"1340") || ($timex>="1820"&&$timex<"1840"))
  {
    //通过
  }else{
   echo "非规定签到时间!<br />你可以在每天的 6:50-7:10 | 13:20-13:40 | 18:20-18:40 进行签到";
   @$log = "INSERT INTO `log` VALUES('非规定时间签到','$name $timex','$ip','$time')";
   @mysqli_query($conn,$log);
   exit();
  }
    //签到时间检测
    
    if (empty($ip)) {
      $strPol = "0193wie452687qazplmxnskdjurythfgvc";
      $max = strlen($strPol)-1;
      for ($i = 0;$i < 20; $i++) {
        $ip.= $strPol[rand(0,$max)];
      }
      goto pass;
    }  
      //防止出现空IP以免出事



    $checkip = "SELECT * FROM `user` where ip = '$ip'";
    $recheckip = mysqli_query($conn,$checkip);
    $arr = mysqli_fetch_assoc($recheckip);
    if (!empty($arr)) {
      echo "<h1>请勿代签!</h1>";
      @$s = "SELECT * FROM `user` WHERE ip = '$ip';";
      @$ss = mysqli_query($conn,$s);
      @$sss = mysqli_fetch_assoc($ss);
      @$namex = $sss['name'];
      @$namexx = $namex . " 帮 " . $name . " 代签";
      @$log = "INSERT INTO `log` VALUES('代签','$namexx','$ip','$time')";
      @mysqli_query($conn,$log);
      exit();
    }
    //代签检测
    
    pass:
  

//通过，进行签到
  $sql = "update `user` SET time = '$time' , ip='$ip' where name ='$name'";
  mysqli_query($conn,$sql);
  //签到

  @$log = "INSERT INTO `log` VALUES('签到','$name','$ip','$time')";
  @mysqli_query($conn,$log);
  //日志

  echo "200";

