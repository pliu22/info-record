<?php

require_once('tcpdf.class.php');

$pdf = new TCPDF('P','mm','A4',true,'UTF-8',false);

//设置文档信息
$pdf->SetCreator('年后啊');
$pdf->SetAuthor('迷惘形成');
$pdf->SetTitle('欢迎欢迎');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF,PDF,PHP');

//设置页眉和页脚
$pdf->SetHeaderData('favicon.ico', 30, 'fdslak', '致力于WEB前端技术在中国的应用',  
      array(0,64,255), array(0,64,128)); 
$pdf->setFooterData(array(0,64,0), array(0,64,128)); 

// 设置页眉和页脚字体 
$pdf->setHeaderFont(Array('stsongstdlight', '', '10')); 
$pdf->setFooterFont(Array('helvetica', '', '8')); 

// 设置默认等宽字体 
$pdf->SetDefaultMonospacedFont('courier'); 
 
// 设置间距 
$pdf->SetMargins(15, 27, 15); 
$pdf->SetHeaderMargin(5); 
$pdf->SetFooterMargin(10); 
 
 // 设置分页 
$pdf->SetAutoPageBreak(TRUE, 25); 
 
// set image scale factor 
$pdf->setImageScale(1.25); 
 
// set default font subsetting mode 
$pdf->setFontSubsetting(true); 
 
//设置字体 
$pdf->SetFont('stsongstdlight', '', 14); 
 
$pdf->AddPage(); 

$str1 = '曾经有一份真诚的爱摆在我的面前，但是我没有珍惜，等到失去的时候才后悔莫及，尘世间最痛苦的事莫过 于此。如果上天可以给我个机会再来一次的话，我会对这个女孩说我爱她，如果非要在这份<p>爱</p>加上一个期限，我希 望是<p>一万年</p>';

$pdf->Write(0,$str1,'',0,'L',true,0,false,false,0);

$pdf->Output('欢迎.pdf','I');