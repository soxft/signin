# signin
一个班级签到系统
## 食用方法
&emsp;&emsp;1.导入数据库
&emsp;&emsp;2.修改文件中(除ip.php外的三个php文件)的$conn所对应的mysql地址
&emsp;&emsp;3.修改数据库中的user表,添加自己班级的用户信息(id->学号/name->姓名/time和ip留空)

## 架构
|_index.php   首页,签到页面,处理页面
|_status.php  统计页面,用于显示签到用户和未签到用户
|_del.php      清除所有统计信息(字段值time和ip)(不清空用户信息)
|_ip.php       获取用户ip
