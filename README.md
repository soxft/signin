# signin
一个班级签到系统

## 食用方法
&emsp;&emsp;1.导入数据库<br />
&emsp;&emsp;2.修改文件中的$conn所对应的mysql地址(除了ip.php和index.php外的文件均需要修改)<br />
&emsp;&emsp;3.修改数据库中的user表,添加自己班级的用户信息(id处填写学号,name处填写姓名,time和ip处留空)<br />

## 注意
&emsp;&emsp;1.由于安全起见,清除本轮统计使用get方式清除,即访问http://example.com/del.php?p=passwd 同时推荐使用定时工具,于每日签到前1小时自动访问该url<br />
&emsp;&emsp;2.含有定时签到,默认只能在每天的6:50-7:10 | 13:20-13:40 | 18:20-18:40 进行签到,你可以在submit.php的第32行处进行修改,同时别忘了修改首页的说明以及submit.php36行的错误提示.<br />
&emsp;&emsp;3.同时forsignin.php历史记录的早中晚通过时间进行计算,提前清除会导致时间计算错误,你可以自行修改del.php的判断方式,也可以自行在第二点签到时间的前1个小时左右签到以免出错,如有疑问请在下方留言

## 架构
|_index.php   首页,签到页面<br />
|_submit.php   签到处理页面<br />
|_status.php  统计页面,用于显示签到用户和未签到用户<br />
|_del.php      清除所有统计信息(字段值time和ip)(不清空用户信息)<br />
|_ip.php       获取用户ip<br />
|_forsignin.php 历史签到的记录<br />

## 版权说明
版权归xcsoft所有,网址本身并未在页面下方标注版权,为的是防止学生查看以免分心,但请不要随意标上自己的版权,感谢配合.
