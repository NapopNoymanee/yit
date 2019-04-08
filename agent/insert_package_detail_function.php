<?php  /*
	$pac_id = $_POST['pac_id'];
	$detail_count = $_POST['detail_count'];
	$pac_detail_name_th = [];
	$pac_detail_des_th = [];
	$pac_detail_pic = [];
	require_once("../con_database/key.php");
	
	date_default_timezone_set("Asia/Bangkok");
	if($_FILES['pic_1']['size'] > 0){
	for ($detail_row = 1; $detail_row <= $detail_count; $detail_row++) {
		$pac_detail_name_th[] = $_POST['topic_' . $detail_row];
		$pac_detail_des_th[] = $_POST['detail_' . $detail_row];
		
		$rename = explode(".", $_FILES["pic_". $detail_row]["name"]);	
		$newname = $pac_id."-".date("Ymdhis")."-".$detail_row.".".end($rename);	
		$directory = "images/pac_detail/".$newname;
		copy($_FILES["pic_". $detail_row]["tmp_name"],"../".$directory );
		$pac_detail_pic[]= $directory;
	}
		
	
		$queryPKdetail = "INSERT INTO pac_detail (pac_id, pac_detail_name_th, pac_detail_pic, pac_detail_des_th) VALUES ";
			for ($i = 0; $i <= count($pac_detail_name_th) - 1; $i++) {
				if ($i > 0) {
					$queryPKdetail = $queryPKdetail . ',';
				}
				$queryPKdetail = $queryPKdetail . "('" . $pac_id . "', '" . $pac_detail_name_th[$i] . "','".$pac_detail_pic[$i]."', '" . $pac_detail_des_th[$i] . "')";
			}
	}else{
		
		for ($detail_row = 1; $detail_row <= $detail_count; $detail_row++) {
		$pac_detail_name_th[] = $_POST['topic_' . $detail_row];
		$pac_detail_des_th[] = $_POST['detail_' . $detail_row];
	}
		$queryPKdetail = "INSERT INTO pac_detail (pac_id, pac_detail_name_th, pac_detail_des_th) VALUES ";
			for ($i = 0; $i <= count($pac_detail_name_th) - 1; $i++) {
				if ($i > 0) {
					$queryPKdetail = $queryPKdetail . ',';
				}
				$queryPKdetail = $queryPKdetail . "('" . $pac_id . "', '" . $pac_detail_name_th[$i] . "', '" . $pac_detail_des_th[$i] . "')";
			}

	}
	if (mysqli_query($conn, $queryPKdetail)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $queryPKdetail . "<br>" . mysqli_error($conn);
	}
*/?>
<!--html>
	<body>
	<div style="display: none;">
		<form name="SentID" id="SentID" action="add_package_price.php" method="POST">
			<p>
				<input type="hidden" name="pac_id" value="<?php //echo $pac_id; ?>" />
			</p>
			<p>
				<input type="submit" value="Submit" />
			</p>
		</form>
	</div>
    <script>
		var auto_refresh = setInterval(
		function()
		{
		submitform();
		}, 1000);

		function submitform()
		{
		document.SentID.submit();
		}
    </script>
	</body>
</html-->