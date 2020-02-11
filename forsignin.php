<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>History</title>
</head>
<body>
<?php
$conn = mysqli_connect("localhost","qd","qdqdqd","qd");
$c = $_GET['c'];
$s = $_GET['s'];
if(!empty($s) && !empty($c))
{
  echo "<h2>$c$s 统计记录</h2>";
  $sql = "SELECT * FROM `history` WHERE `timec`= '$c' AND `times`='$s';";
  $re = mysqli_query($conn,$sql);
  $arr = mysqli_fetch_assoc($re);
  echo "<h3>签到：</h3>" . $arr['y'] . "人";
  echo "<h3>未签到：</h3>" . $arr['n'] . "人";
  echo "<h3>未签到名单：</h3>";
  if(!empty($arr['name']))
  {
    echo $arr['name'];
  }else{
    echo "无";
  }
  echo "<br /><br /><br /><center><a href=\"./forsignin.php\">返回</a></center>";
exit();
}
$sql = "SELECT * FROM `history` ORDER BY time DESC;";
$re = mysqli_query($conn,$sql);
echo"<h3>所有记录：</h3>";
echo "<table rules=none>
<tr>
<td>时间</td>
<td></td>
<td>签到</td>
<td></td>
<td>未签到</td>
<td></td>
<td>未签到名单</td>
";
while ($row = mysqli_fetch_object($re)) 
{
   echo "<tr>
          <td>$row->timec$row->times</td>
          <td>,&emsp;</td>
          <td>$row->y 人</td>
          <td>,&emsp;</td>
          <td>$row->n 人</td>
          <td>,&emsp;</td>
          <td><a href=\"./forsignin.php?c=$row->timec&&s=$row->times\">查看</a></td>
          </tr>";
}
echo "</table>";

?>
</body>
