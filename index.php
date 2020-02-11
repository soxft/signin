<?php
if($_GET['s'] == "s")
{
  header("Refresh:0;url=\"./status.php\"");
  exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <title>TZGJZX Class 2 Signin</title>
        <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/css/mdui.min.css">
        <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/js/mdui.min.js"></script>
    </head>
    <header class="mdui-appbar mdui-appbar-fixed">
        <body background="https://time.xsot.cn/img/background.png" class="mdui-appbar-with-toolbar">
            <div class="mdui-toolbar mdui-color-theme"> <a class="mdui-typo-title">高一(2)班签到系统</a>

            </div>
    </header>
    <br />
    <div class="mdui-container doc-container">
        <div class="mdui-typo">
             <h2>签到</h2>
            <p>当前时间:
                <?php echo date( "H时i分s秒") ?>
            </p>
            <div class="mdui-textfield">
                <input id="name" time="name" class="mdui-textfield-input" type="text" placeholder="姓名" />
            </div>
            <br>
            <center>
            <button onClick="Submit();" id="Submit" class="mdui-btn mdui-btn-dense mdui-color-grey-300"><i class="mdui-icon material-icons">&#xe569;</i></button>
            </center>
        </div>
    </div>
    <br />
    <div class="mdui-container">
    <div class="mdui-typo">
      <h2 class="doc-chapter-title doc-chapter-title-first">注意</h2>
      &emsp;你可以在每天的 6:50-7:10 | 13:20-13:40 | 18:20-18:40 进行签到<br />
    </div>
    </div>
    <br />
    <script>
    function Submit() {
        document.getElementById("Submit").innerHTML = "签到中...";
        var name = document.getElementById("name").value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./submit.php");
        xhr.setRequestHeader('Content-Type', ' application/x-www-form-urlencoded');
        xhr.send("name=" + name);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("Submit").innerHTML =
                    "<i class=\"mdui-icon material-icons\">&#xe569;</i>";
                if (xhr.responseText == 200) {
                    mdui.dialog({
                        title: '签到成功',
                        content: '学习这件事不在乎有没有人教你，最重要的是在于你自己有没有觉悟和恒心.<br />--法国昆虫学家,动物行为学家,文学家 法布尔',
                        modal: true
                    });
                } else {
                    mdui.alert(xhr.responseText, '签到失败');
                }
            }
        }
    }
    </Script>
    </body>
</html>