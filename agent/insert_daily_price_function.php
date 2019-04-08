<?php
	$pac_code = $_GET['pac_code'];
	$pac_id = base_convert($pac_code, 36, 10);
	
	//echo print_r($_POST);
	date_default_timezone_set("Asia/Bangkok");
	if ((intval(date("m"))+1) > 12) {
		$year = date("Y")+1;
	}else {
		$year = date("Y");
	}	
	$day_of_month_1 = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
	$day_of_month_2 = cal_days_in_month(CAL_GREGORIAN, (date("m")+1)%12, $year);
	
	$month_adult_1 = [];
	$month_clild_1 = [];
	$month_peo_limit_1 = [];
	$month_adult_2 = [];
	$month_clild_2 = [];
	$month_peo_limit_2 = [];
		$this_month_num = intval(date("m"));
		for ($dateloop = 1; $dateloop <= $day_of_month_1; $dateloop++) {
			$month_adult_1[] = $_POST['adult_'.$dateloop.'m'.$this_month_num];
			$month_clild_1[] = $_POST['child_'.$dateloop.'m'.$this_month_num];
			$month_peo_limit_1[] = $_POST['peo_limit_'.$dateloop.'m'.$this_month_num];
		}
		$next_month_num = intval(date("m"))+1;
		for ($dateloop = 1; $dateloop <= $day_of_month_2; $dateloop++) {
			$month_adult_2[] = $_POST['adult_'.$dateloop.'m'.$next_month_num];
			$month_clild_2[] = $_POST['child_'.$dateloop.'m'.$next_month_num];
			$month_peo_limit_2[] = $_POST['peo_limit_'.$dateloop.'m'.$next_month_num];
		}
		//echo print_r($_POST);
	$first_query = "INSERT INTO pac_daily_price (pac_id, pac_daily_price_id, adult_price, child_price, peo_limit) VALUES ";
	for ($add_query_date = 1; $add_query_date <= $day_of_month_1; $add_query_date++) {
		if ($add_query_date > 1) {
			$first_query = $first_query . ",";
		}
		$first_query = $first_query . "('" . $pac_id . "', '" . date("Y") . "-" . $this_month_num . "-" . $add_query_date . "', '" . $month_adult_1[$add_query_date-1] . "', '" . $month_clild_1[$add_query_date-1] . "', '" . $month_peo_limit_1[$add_query_date-1] . "')";
	}
	for ($add_query_date = 1; $add_query_date <= $day_of_month_2; $add_query_date++) {
		$first_query = $first_query . ",";
		$first_query = $first_query . "('" . $pac_id . "', '" . $year . "-" . $next_month_num . "-" . $add_query_date . "', '" . $month_adult_2[$add_query_date-1] . "', '" . $month_clild_2[$add_query_date-1] . "', '" . $month_peo_limit_2[$add_query_date-1] . "')";
	}
	//echo print_r($first_query);
	
	require_once("../con_database/key.php");
	if (mysqli_query($conn, $first_query)) {
		echo "New record created successfully";
		header('Location: agent_home.php');
	} else {
		echo "Error: " . $first_query . "<br>" . mysqli_error($conn);
	}
?>