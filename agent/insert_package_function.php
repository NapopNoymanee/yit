<?php
	require_once("../con_database/key.php"); 

	date_default_timezone_set('Asia/Bangkok');
	$ID_date = date('y') . date('m') . date('d') . date('H') . date('i') . date('s');
	$ID_Agent = "0001";
	$pac_id = $ID_Agent . $ID_date;
	$pac_code = base_convert($pac_id, 10, 36); 
	
	$pac_tour_type = $_POST['tour_type'];
	$pac_location = $_POST['province'];
	$pac_name_th = $_POST['package_name'];
	$pac_day = $_POST['duration_day'];
	$pac_night = $_POST['duration_night'];
	$pac_app_time = $_POST['duration_hour'] . ':' . $_POST['duration_minute'];
	
	$pac_facility = '';
	$queryFac = "SELECT fac_option_id FROM facility_option";
	$RecordsetFac = mysqli_query($conn,$queryFac);
	for ($i = 1; $i <= mysqli_num_rows($RecordsetFac); $i++) {
		if (isset($_POST['Fac_' . $i])) {
			if ($_POST['Fac_' . $i] = 'on') {
				if ($pac_facility == NULL) {
					$pac_facility = $i;
				}else {
					$pac_facility = $pac_facility . '/' . $i;
				}
			}
		}
	}
	
	$pac_safety = '';
	$querySafe = "SELECT safety_option_id FROM safety_option";
	$RecordsetSafe = mysqli_query($conn,$querySafe);
	for ($i = 1; $i <= mysqli_num_rows($RecordsetSafe); $i++) {
		if (isset($_POST['Safe_' . $i])) {
			if ($_POST['Safe_' . $i] = 'on') {
				if ($pac_safety == NULL) {
					$pac_safety = $i;
				}else {
					$pac_safety = $pac_safety . '/' . $i;
				}
			}
		}
	}
	
	$pac_adult_wholesale_price = $_POST['pac_adult_wholesale_price'];
	$pac_child_wholesale_price = $_POST['pac_child_wholesale_price'];
	$pac_adult_retail_price = $_POST['pac_adult_retail_price'];
	$pac_child_retail_price = $_POST['pac_child_retail_price'];
	$pac_peo_min = $_POST['pac_peo_min'];
	$pac_peo_limit = $_POST['pac_peo_limit'];
	$pac_location_app = $_POST['pac_location_app'];
	$pac_des_th = $_POST['pac_des_th'];
	$pac_keyword_th = $_POST['pac_keyword_th'];
	
	
		$rename = explode(".", $_FILES["tour_pic"]["name"]);	
		$newname = $pac_id."-".date("Ymdhis").".".end($rename);	
		$directory = "images/pac_profile/".$newname;
		copy($_FILES["tour_pic"]["tmp_name"],"../".$directory );
		
		/*$new_images = "Thumbnails_".$_FILES["tour_pic"]["name"];
		copy($_FILES["tour_pic"]["tmp_name"],"resize_pic/".$_FILES["tour_pic"]["name"]);
		$width=700; 
		$size=GetimageSize($images);
		$height=round($width*$size[1]/$size[0]);
		$images_orig = ImageCreateFromJPEG($images);
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		ImageJPEG($images_fin,"upload_title_pic/".$newname);
		ImageDestroy($images_orig);
		ImageDestroy($images_fin);*/
	
	$queryPK = "INSERT INTO packagetour (pac_id, pac_code, agent_id, pac_picture, pac_tour_type, pac_location, pac_name_th, pac_day, pac_night, pac_app_time, pac_facility, pac_safety, pac_adult_wholesale_price, pac_child_wholesale_price, pac_adult_retail_price, pac_child_retail_price, pac_peo_min, pac_peo_limit, pac_location_app, pac_des_th, pac_keyword_th, pac_status, pac_timestamp) 
			VALUES ('$pac_id','$pac_code', '$ID_Agent','$directory', '$pac_tour_type', '$pac_location', '$pac_name_th', '$pac_day', '$pac_night', '$pac_app_time', '$pac_facility', '$pac_safety', '$pac_adult_wholesale_price', '$pac_child_wholesale_price', '$pac_adult_retail_price', '$pac_child_retail_price', '$pac_peo_min', '$pac_peo_limit', '$pac_location_app', '$pac_des_th', '$pac_keyword_th', 'รออนุมัติ', now())";
	if (mysqli_query($conn, $queryPK)) {
		echo "New record created successfully";
		header('Location: add_package_detail.php?pac_code='.$pac_code);
	} else {
		echo "Error: " . $queryPK . "<br>" . mysqli_error($conn);
	}

?>