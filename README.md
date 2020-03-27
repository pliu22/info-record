# php 有用方法


```php
//远程请求 URL,一般会请求到网页的缓存,使用 curl_setopt 中的 CURLOPT_FRESH_CONNECT 参数 强制使用新的链接发送请求
function curl_file_get_contents($durl){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $durl);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);
    curl_setopt($ch, CURLOPT_REFERER,_REFERER_);
    //CURLOPT_FRESH_CONNECT TRUE可强制使用新的连接,远离请求缓存
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $r = curl_exec($ch);
    curl_close($ch);
    return $r;
}
```

# github 访问不了时 
访问 http://tool.chinaz.com/nslookup/
将 github.com 放在 域名查询哪里 就可以得到 服务器的真实地址 然后 在改地址放在hosts里面 修改即可

## 13.250.177.223 github.com

