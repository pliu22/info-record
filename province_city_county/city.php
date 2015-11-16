<?php
	require "./init.class.php";
	$con  = new init();
	$pid  = substr($_GET['cityid'],strpos($_GET['cityid'],'-'));
	$citysql =  'select * from province_city_county where pid = '.$pid ;

	$rec  = mysql_query($citysql);
	$s = null;
	while($row   =  mysql_fetch_assoc($rec)){
		$s .= "<option  value=".$row['pid']."_".$row['id'].">".$row['name']."</option>";
	}
	echo $s;