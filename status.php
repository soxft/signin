<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign-in statistics</title>
</head>
<body>
  <?php
  require_once('ip.php');
  $time = time();
  $conn = mysqli_connect("localhost","qd","qdqdqd","qd");
  //数据库

  echo"<h3>未签到：</h3>";
  echo "<table rules=none>";
  $j = 0;
  $sql = "SELECT * FROM `user`";
  $re = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_object($re)) {
    $id = $row->id;
    $name = $row->name;
    $time = $row->time;
    if (empty($time)) {
      $j++;
      echo "<tr>
          <td>$name</td>
          </tr>";
    }
  }
  echo "</table>";



  /*******************************/



  echo "<br /><br /><br /><h3>已签到:</h3>";
  echo "<table rules=none>";
  $i = 0;
  $sql = "SELECT * FROM `user` order by time";
  $re = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_object($re)) {
    $id = $row->id;
    $name = $row->name;
    $time = $row->time;
    $ip = $row->ip;
    if (!empty($time)) {
      $i++;
      $times = date("H:i:s",$time);
      echo "<tr>
        <td>$name</td>
        <td>,&emsp;<td>
        <td>$times</td>
        </tr>";
    }
  }
  echo "</table>";
  echo "<br /><br /><br /><h3>总计：</h3>签到" . $i . "人,未签到 " . $j . "人";
  echo "<br /><br /><a href=\"./forsignin.php\">历史记录</a><br />";
  echo "Tip:清除记录功能暂时移除,由程序于每天在签到前1小时左右自动清除";
  ?>
</body>
