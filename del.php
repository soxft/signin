<?php
$conn = mysqli_connect("localhost","","","");
if (isset($_POST['submit'])) {
  if ($_POST['passwd'] == "passwd") {
    $sql = "SELECT * FROM `user`";
    $re = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_object($re)) {
      $id = $row->id;
      $sqlx = "update `user` SET time = '' , ip='' where id ='$id'";
      @mysqli_query($conn,$sqlx);
    }
          echo "<h1>成功!</h1>";
  }else{
    echo "<h1>密码错误!!</h1>";
  }
} else {
  ?>
  <form action="" method="post">
    <input type="text" placeholder="密码" name="passwd" />
    <br /><br />
    <input type="submit" name="submit" value="清除" />
  </form>
  <?php
}
?>