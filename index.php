<?php
require_once('ip.php');
$time = time();
$conn = mysqli_connect("localhost","","","");
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $sql = "SELECT * FROM `user` where name = '$name'";
  $re = mysqli_query($conn,$sql);
  $arr = mysqli_fetch_assoc($re);
  if (empty($arr['name'])) {
    echo "<h1>非本班同学!</h1><br />";
    echo "<h1>部分同学可能因姓名录入错误,请群内联系予以修改!</h1>";
    exit();
  }
  if (!empty($arr['time'])) {
    echo "<h1>您已经签过到了</h1>";
    exit();
  } else {
  $checkip = "SELECT * FROM `user` where ip = '$ip'";
  $recheckip = mysqli_query($conn,$checkip);
  $arr = mysqli_fetch_assoc($recheckip);
  if(!empty($arr)){
     echo "<h1>同一ip只能签到一次!</h1>";
     exit();
  }
    $sql = "update `user` SET time = '$time' , ip='$ip' where name ='$name'";
    $re = mysqli_query($conn,$sql);
    echo "<h1>签到成功!</h1>";
  }
} else {
  ?>
  <!DOCTYPE html>
  <html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TZGJZX Class 2 签到系统</title>
  </head>
  <body>
    <h1>TZGJZX Class 2 签到系统</h1>
    <p>
      Time: <?php echo date("m月d日H时i分s秒") ?>
    </p>
    <form action="" method="post">
      <input type="text" maxlength="10" placeholder="姓名" name="name" />
      <br /><br />
      <input type="submit" name="submit" value="签到" />
    </form>
    <br /><br />
    <a href="./status.php">签到状态</a>
  </body>
</html>
<?php
}
?>