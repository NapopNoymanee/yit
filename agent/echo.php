<?php
	//echo $_POST['echo'];
	
	/*require_once("../con_database/key.php");
	$query = "INSERT INTO pac_daily_price (pac_id, pac_daily_price_id, adult_price, child_price, peo_limit) VALUES ";
	for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, (date("m")+2), date("Y")); $i++) {
		if ($i > 1) {
			$query = $query . ",";
		}
		$query = $query . "('1000', '" . date("Y") . "-" . (date("m")+2) . "-" . $i . "', '0', '0', '0')";
	}
	if (mysqli_query($conn, $query)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
	echo $query;*/
	
	/*$queryDisplay = "SELECT * FROM pac_daily_price WHERE pac_id = '1000'";
	$recordsetDisplay = mysqli_query($conn,$queryDisplay);
	echo count(mysqli_fetch_assoc($recordsetDisplay));*/
	//date_default_timezone_set("Asia/Bangkok");
	echo date('c');
?>