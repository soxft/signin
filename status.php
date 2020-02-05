<?php
$conn = mysqli_connect("localhost","","","");
echo"<h3>未签到：</h3>";

echo "<table border=\"1\">
  <tr>
  <th>学号</th>
  <th>姓名</th>
  </tr>
  ";
$sql = "SELECT * FROM `user`";
$re = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_object($re)) {
  $id = $row->id;
  $name = $row->name;
  $time = $row->time;
  if (empty($time)) {
    echo "<tr>
        <td>$id</td>
        <td>$name</td>
        </tr>";
  }
}
echo "</table>";

/*******************************/

echo "<br /><br /><br /><h3>已签到:</h3>";
echo "<table border=\"1\">
  <tr>
  <th>排名</th>
  <th>学号</th>
  <th>姓名</th>
  <th>签到时间</th>
  <th>ip</th>
  </tr>
  ";
$sql = "SELECT * FROM `user` order by time";
$re = mysqli_query($conn,$sql);
$i = 0;
while ($row = mysqli_fetch_object($re)) {
  $id = $row->id;
  $name = $row->name;
  $time = $row->time;
  $ip = $row->ip;
  if (!empty($time)) {
    $i++;
    $times = date("H时i分s秒",$time);
    echo "<tr>
        <td>$i</td>
        <td>$id</td>
        <td>$name</td>
        <td>$times</td>
        <td>$ip</td>
        </tr>";
  }
}
echo "</table>";


echo "<br /><br /><br /><a href=\"./del.php\">清除当前记录?</a>";