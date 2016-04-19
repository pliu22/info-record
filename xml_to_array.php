<?php
//xml格式文件解析

$xml = <<<XML
<?xml version='1.0' encoding='ISO-8859-1'?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>
XML;
$xml = simplexml_load_string($xml); print_r($xml->body);echo "<hr/>";

//直接读取xml文件,重要参数是xml文件路径
$xml = simplexml_load_file('test.xml'); 
print_r($xml);echo "<hr/>";
echo $xml->body."<hr/>";


//将xml文件转换为json,然后更换成为数组即可
$json = json_encode($xml);
$array = json_decode($json,true);
var_export($array);echo "<hr/>";
