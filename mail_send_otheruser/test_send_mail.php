<?php

require('smtp.class.php');//引入邮件发送类

$smtpserver = "smtp.yeah.net"; //邮箱服务器

$smtpserverport = 25; //邮箱服务端口

$smtpusermail = "";//自己的邮箱账号

$smtpemailto = '';//接受邮件的邮箱

$smtpuser = "";//自己的邮箱账号

$smtppass = "";//自己的邮箱密码

$mailsubject = '测试发送邮件';//发送的邮件主题
$mailbody 	= "请激活你的账户http://localhost/Test/id=".rand(0,11111100000000);//发送的邮件主题

$mailtype = 'TXT';//邮件格式(HTML\TXT),TXT文本邮件

$smtp  = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);

$smtp->debug = TRUE;
$res = $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 
if($res){
	echo "发送成功,请您在您的邮箱查看邮件!";
}else{
	echo "sorry";
}