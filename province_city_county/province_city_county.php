<?php
	require "./init.class.php";
	$con  = new init();
	$sql = "select * from province_city_county where pid = 0";
	$rec = mysql_query($sql);
	$s = null;
	while($row  = mysql_fetch_assoc($rec)){
		$s .= "<option  value=".$row['pid']."_".$row['id'].">".$row['name']."</option>";
	}
	?>
<html>
	<header>
		<meta content-type="text/html" charset="utf8" >
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	</header>
	<body>
		<select id="provinceid">
			<option value="null">please selected</option>
			<?php echo $s;?>
		</select>
		<select id="cityid">
			<option value="null">please selected</option>

		</select><select id="countyid">
			<option value="null">please selected</option>

		</select>
	</body>
	<script type="text/javascript">
	$('#provinceid').blur(function(){
		$.get('./city.php',{
			provinceid : $(this).val(),
		},function(data,textStatus){
			$('#cityid').html(data);
		});
	});
	$('#cityid').blur(function(){
		$get('./county.php',{
			cityid : $(this).val(),
		},function(data,textStatus){
			$('#county').html(data);
		});
	});
	</script>
</html>