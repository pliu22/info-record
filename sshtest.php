<?php
    // 通过SSH登录远程主机，实现远程执行shell的功能。
    header('Content-Type:text/html;charset=UTF-8'); 
     
    define('SSH_USER', 'user');                 //登陆LINUX的用户名
    define('SSH_PWD', 'password');                    //登陆LINUX的密码
    define('SSH_PORT', 22);                     //登陆LINUX的端口--SSH默认端口22
    define('SSH_HOST', 'ip地址');         //登陆LINUX的IP地址(虚拟机)
 
    if(!function_exists("ssh2_connect")){
        exit('SSH扩展没有安装或者没有安装成功');
    }
 
    //使用SSH2进行连接
    $ssh2 = ssh2_connect(SSH_HOST, SSH_PORT);
    if(!$ssh2){
        exit('服务器连接不上???');
    }else{
        echo '已经成功连接上了服务器!!!<hr>';
    }
 
    // 验证用户名和密码
    ssh2_auth_password( $ssh2, SSH_USER, SSH_PWD );
 
    if(@$_POST['submit']){      //表单提交了值
        $a = $_POST['numA'] ? $_POST['numA'] : 4 ;
        $b = $_POST['numB'] ? $_POST['numB'] : 5 ;
        $command = "pwd;ls";
    }else{                        //表单未提交值
        $command = 'pwd;whoami;ls -l;'; 
    }
 
    $stream = ssh2_exec($ssh2, $command);       
    $errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
     
    //阻塞模式--延伸阅读：http://blog.csdn.net/linvo/article/details/5466046
    //关于文件流的阻塞与非阻塞模式
    stream_set_blocking($stream, true);
    stream_set_blocking($errorStream, true);
 
    //stream_get_contents类似于file_get_contents
    $cmd = stream_get_contents( $stream );
    $errorInfo = stream_get_contents( $errorStream );
 
    fclose( $stream );
    fclose( $errorStream );
    print_r( $cmd );        //执行脚本后的返回正确的信息
    echo '<hr>';
    var_dump( $errorInfo ); //返回脚本错误的信息
?>
 
<form action="#" method="post">
    数值1 <input type="text" name="numA"><br>
    数值2 <input type="text" name="numB"><br>
    <input type="submit" name="submit" value="提交">
</form>
