<?php
//echo print_r($_GET);
	$pac_code = $_GET['pac_code'];
	$pac_id = base_convert($pac_code, 36, 10);
	$add_det = $_GET['add_det'];
	$page_from = $_GET['page_from'];
	if($add_det == -1) {
		$detid = $_GET['detid'];
		$query = "DELETE FROM pac_detail WHERE pac_id = '".$pac_id."' AND pac_detail_id = '".$detid."'";
	}else if ($add_det == 1) {
		$det_date = $_POST['det_date'];
		$det_time = $_POST['det_time_hour'].':'.$_POST['det_time_minute'].':00';
		$pac_detail_des_th = $_POST['detail'];
		
		$rename = explode(".", $_FILES["pic"]["name"]);	
		$newname = $pac_id."-".date("Ymdhis").".".end($rename);	
		$directory = "images/pac_profile/".$newname;
		copy($_FILES["pic"]["tmp_name"],"../".$directory );
		
		$query = "INSERT INTO pac_detail (pac_id, pac_detail_date, pac_detail_time, pac_detail_pic, pac_detail_des_th) VALUES ('".$pac_id."', '".$det_date."', '".$det_time."', '".$directory."', '".$pac_detail_des_th."')";
	}else if ($add_det == 0) {
		$detid = $_GET['detid'];
		$det_date = $_POST['det_date'];
		$det_time = $_POST['det_time_hour'].':'.$_POST['det_time_minute'];
		$pac_detail_des_th = $_POST['detail'];
		
		$rename = explode(".", $_FILES["pic"]["name"]);	
		$newname = $pac_id."-".date("Ymdhis").".".end($rename);	
		$directory = "images/pac_profile/".$newname;
		copy($_FILES["pic"]["tmp_name"],"../".$directory );
		
		$query = "UPDATE pac_detail SET pac_detail_date = '$det_date', pac_detail_time = '$det_time', pac_detail_pic = '$directory', pac_detail_des_th = '$pac_detail_des_th' WHERE pac_id = '$pac_id' AND pac_detail_id = '$detid'";
	}
	require_once("../con_database/key.php");
	if (mysqli_query($conn, $query)) {
		echo "New record created successfully";
		header('Location: '.$page_from.'.php?pac_code='.$pac_code);
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
	//echo $query;
	
?>