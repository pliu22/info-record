# php_study_record
learning php record!中西结合！哈哈！

​```php
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
​```