<?php
	date_default_timezone_set("Asia/Bangkok");
	if(isset($_GET['sort_by'])) {
		$sort_by = $_GET['sort_by'];
		$sort_by_style = $_GET['sort_by_style'];
		if ($sort_by_style == "DESC") {
			$sort_by_style_sent = "ASC";
		}else {
			$sort_by_style_sent = "DESC";
		}
	} else {
		$sort_by = "pac_id";
		$sort_by_style = "DESC";
		$sort_by_style_sent = "ASC";
	}
	require_once("../con_database/key.php"); 
	$queryTour = "SELECT * FROM packagetour ORDER BY ".$sort_by." ".$sort_by_style;
	$queryTourType = "SELECT * FROM tour_type ORDER BY tour_type_id ASC";
	$RecordsetTour = mysqli_query($conn,$queryTour);
	$RecordsetTourType = mysqli_query($conn,$queryTourType);
	$array_TourType = [' '];
	while ($Recordsetassoc = mysqli_fetch_assoc($RecordsetTourType)) {
		$array_TourType[] = $Recordsetassoc['tour_type_name_th'];
	}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

    <link rel="stylesheet" href="../css/w3style.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit|Sarabun" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body,h1,h2,h3,h4,h5,h6,a {font-family: 'Kanit', sans-serif;}
    .w3-bar,h1,button {font-family: 'Sarabun', sans-serif;}
	.font-itim {font-family: 'Sarabun', sans-serif;}
    </style>
    <title>Insert Transaction</title>    
  </head>
 
 	<body class="bg-light">
    <?php include 'navbar.php'; ?>
	
	<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
	
		<div class="w3-quarter-body w3-container">
		  &nbsp;
		</div>
		
		<div class="w3-half-body w3-row ">
		
			<div class="w3-row ">
				<div class="w3-half  w3-container" >
				  <h2>จัดการแพคเกจทัวร์</h2>
				</div>
				<div class="w3-half  w3-container" >
					<form action="agent_home.php" method="post"> 
					  <button class="w3-button w3-right w3-hover-green w3-padding-16" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					  <input class="w3-input w3-border w3-right w3-animate-input w3-round-large" type="text" placeholder="ใส่คำค้นหา" style="max-width: 80%;width:230px">
					</form>
				</div>
			</div>	
			<div class="w3-row ">	

				<div class="w3-half w3-container w3-padding-16">
					<a href="add_package.php"><button class="w3-button w3-green w3-hover-blue w3-round-xlarge w3-padding" >+ เพิ่มแพคเกจทัวร์ </button></a>
				</div>
				
				<div class="w3-half w3-container" >
					<p>
						<b>จัดเรียงตาม</b>
						<a href="agent_home.php?sort_by=pac_name_th&sort_by_style=<?php echo $sort_by_style_sent; ?>"><button class="w3-button w3-white w3-border w3-border-red w3-hover-red w3-round-xxlarge  w3-padding-small" style="margin: 5px;">ชื่อแพคเกจ</button></a>
						<a href="agent_home.php?sort_by=pac_tour_type&sort_by_style=<?php echo $sort_by_style_sent; ?>"><button class="w3-button w3-white w3-border w3-border-green w3-hover-green w3-round-xxlarge  w3-padding-small" style="margin: 5px;">ประเภททัวร์</button></a>
						<a href="agent_home.php?sort_by=pac_timestamp&sort_by_style=<?php echo $sort_by_style_sent; ?>"><button class="w3-button w3-white w3-border w3-border-yellow w3-hover-yellow w3-round-xxlarge w3-padding-small" style="margin: 5px;">วันอัพเดต</button></a>
						<a href="agent_home.php?sort_by=pac_adult_retail_price&sort_by_style=<?php echo $sort_by_style_sent; ?>"><button class="w3-button w3-white w3-border w3-border-blue w3-hover-blue w3-round-xxlarge w3-padding-small" style="margin: 5px;">ราคา</button></a>
					</p>
				</div>
			</div>
			
			<div class="w3-white w3-container">&nbsp;</div>
			
			<?php
				$row_color = 0;
				while ($row_tour = mysqli_fetch_assoc($RecordsetTour)) {
			?>
			<a href="edit_package.php?pac_code=<?php echo $row_tour['pac_code']; ?>"><div class="w3-border-top" >
				<div class="w3-quarter w3-center" >
				<img src="../<?php echo $row_tour['pac_picture']; ?>" style="width:80%" class="w3-margin " alt="Alps">
				</div>
				<div class="w3-half" style="word-break: break-all;" >
				  <h4><?php echo $row_tour['pac_name_th']; ?></h4>
				  <h5><?php echo $row_tour['pac_name_cn']; ?></h5>
				  <h6><?php echo $array_TourType[$row_tour['pac_tour_type']]; ?></h6>
				  <p><?php echo mb_strimwidth($row_tour['pac_des_th'], 0, 300, "..."); ?></p>
				</div>
				<div class="w3-quarter w3-panel w3-leftbar w3-border-light-blue" >
				  <h5>ราคา <?php echo $row_tour['pac_adult_retail_price']; ?>/<?php echo $row_tour['pac_child_retail_price']; ?> บาท รับได้ <?php echo $row_tour['pac_peo_limit']; ?> คน</h5>
				  <h5><?php echo $row_tour['pac_day']; ?> วัน <?php echo $row_tour['pac_night']; ?> คืน นัดเวลา <?php echo $row_tour['pac_app_time']; ?> น.</h5>
				  <?php
					$date_now = [date("Y"), date("m"), date("d")];
					$splitTimeStamp = explode(" ",$row_tour['pac_timestamp']);
					$date_stamp = explode("-",$splitTimeStamp[0]);
					$date_diff = ((($date_now[0]-$date_stamp[0])*365)+(($date_now[1]-$date_stamp[1])*30+($date_now[2]-$date_stamp[2])));
					//$date_diff_from_30 = 30 - $date_diff;
				?>
				  <h5>อัพเดทเมื่อ <?php echo $date_diff; ?> วันที่แล้ว</h5>
				  <!--<h5>อีก <?php echo $date_diff_from_30; ?> วันต้องใส่ข้อมูลราคา</h5>
				  <p>อัพเดตเมื่อ <?php echo $row_tour['pac_timestamp']; ?></p>-->
				</div>
			</div></a>
			<div class="w3-container <?php if ($row_color % 2 == 0) { echo "w3-light-grey";} ?>">&nbsp;</div>
			<?php $row_color++;} ?>
			<div class="w3-container w3-white ">&nbsp;</div>
			
		</div>
		
		<div class="w3-quarter-body w3-container">
		  &nbsp;
		</div>
		
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>	
		
	<?php include 'footer.php'; ?>
  </body>
</html>
