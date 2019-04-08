<?php
	//$pac_id = $_POST['pac_id'];
	$pac_code = $_GET['pac_code'];
	$pac_id = base_convert($pac_code, 36, 10);
	//date_default_timezone_set("Asia/Bangkok");
	
	$query[] = "SELECT * FROM facility_option";
	$query[] = "SELECT * FROM packagetour WHERE pac_id = '".$pac_id."'";
	$query[] = "SELECT * FROM pac_daily_price WHERE pac_id = '".$pac_id."'";
	$query[] = "SELECT * FROM pac_detail WHERE pac_id = '".$pac_id."' ORDER BY pac_detail_date ASC, pac_detail_time ASC";
	$query[] = "SELECT * FROM safety_option";
	$query[] = "SELECT * FROM sys_province";
	$query[] = "SELECT * FROM tour_type";
	require_once("../con_database/key.php");
	$Recordset_facility_option = mysqli_query($conn,$query[0]);
	$Recordset_packagetour = mysqli_query($conn,$query[1]);
	$Recordset_pac_daily_price = mysqli_query($conn,$query[2]);
	$Recordset_pac_detail = mysqli_query($conn,$query[3]);
	$Recordset_safety_option = mysqli_query($conn,$query[4]);
	$Recordset_sys_province = mysqli_query($conn,$query[5]);
	$Recordset_tour_type = mysqli_query($conn,$query[6]);
	
	$Recordarray_tour_type_id = [];
	$Recordarray_tour_type_name_th = [];
	while ($Recordassoc_tour_type = mysqli_fetch_assoc($Recordset_tour_type)) {
		$Recordarray_tour_type_id[] = $Recordassoc_tour_type['tour_type_id'];
		$Recordarray_tour_type_name_th[] = $Recordassoc_tour_type['tour_type_name_th'];
	}
	$Rrecordarray_sys_province_id = [];
	$Rrecordarray_sys_province_name_th = [];
	while ($Recordassoc_sys_province = mysqli_fetch_assoc($Recordset_sys_province)) {
		$Rrecordarray_sys_province_id[] = $Recordassoc_sys_province['prov_id'];
		$Rrecordarray_sys_province_name_th[] = $Recordassoc_sys_province['prov_name_th'];
		
	}
	
	$Rrecordarray_facility_option_id = [];
	$Rrecordarray_facility_option_name_th = [];
	while ($Recordassoc_facility_option = mysqli_fetch_assoc($Recordset_facility_option)) {
		$Rrecordarray_facility_option_id[] = $Recordassoc_facility_option['fac_option_id'];
		$Rrecordarray_facility_option_name_th[] = $Recordassoc_facility_option['fac_name_th'];
	}
	
	$Rrecordarray_safety_option_id = [];
	$Rrecordarray_safety_option_name_th = [];
	while ($Recordassoc_safety_option = mysqli_fetch_assoc($Recordset_safety_option)) {
		$Rrecordarray_safety_option_id[] = $Recordassoc_safety_option['safety_option_id'];
		$Rrecordarray_safety_option_name_th[] = $Recordassoc_safety_option['safety_name_th'];
	}

	$Recordassoc_packagetour = mysqli_fetch_assoc($Recordset_packagetour);
	$Fac_selected = explode("/", $Recordassoc_packagetour['pac_facility']);
	$Saf_selected = explode("/", $Recordassoc_packagetour['pac_safety']);
	
	$page_from = 'edit_package';
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
    <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {font-family: 'Sarabun', sans-serif;}
    .w3-bar,p,button,a,h1,h2,h3,h4,h5,h6 {font-family: 'Sarabun', sans-serif;}
    </style>
    <title>Insert Transaction</title>

  </head>
 
 	<body class="bg-light">
    <?php include 'navbar.php'; ?>
	 <?php include 'edit_package_popup.php'; ?>
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
		
		<div class="w3-quarter w3-container">
		  &nbsp;
		</div>
		<form class="w3-white" method="post" enctype="multipart/form-data" action="insert_package_function.php" >
		
		<div class="w3-half w3-container ">
			  
			  	<p>
					<div class="w3-quarter">
						&nbsp;
					</div>
					<div class="w3-center w3-half">
						<h2>แก้ไขแพคเกจทัวร์   &nbsp;</h2>
					</div>
					<div class="w3-quarter">
						<!--p id="edit_pk" onclick="enableEdit(pac_allid)" class="fa fa-pencil-square-o fa-lg w3-right" aria-hidden="true" >คลิกเพื่อแก้ไข</p-->
						<a  onclick="document.getElementById('edit_pack').style.display='block'"><i class="fa fa-pencil-square-o fa-lg w3-right w3-text-pink" aria-hidden="true" >คลิกเพื่อแก้ไข</i></a>
					</div>
				</p>

		<div class="w3-container">
		  &nbsp;
		</div>
		
			  <p>
				  <h2 class="w3-center"><?php echo $Recordassoc_packagetour['pac_name_th']; ?></h2>
			  </p>
			  
			  <p>
				  <img src="../<?php echo $Recordassoc_packagetour['pac_picture']; ?>" style="width:100%" class="w3-padding">
			  </p>
			  
			  <p>
				<h5>
					<?php
						for ($num_tour_type = 0; $num_tour_type < count($Recordarray_tour_type_id); $num_tour_type++) {
							if ($Recordarray_tour_type_id[$num_tour_type] == $Recordassoc_packagetour['pac_tour_type']) {
								$tour_type_checked = 'selected="selected" ';
								echo $Recordarray_tour_type_name_th[$num_tour_type];
							}
						}
					?>
				ในจังหวัด	
					<?php
					for ($num_prov = 0; $num_prov < count($Rrecordarray_sys_province_id); $num_prov++) {
						if ($Rrecordarray_sys_province_id[$num_prov] == $Recordassoc_packagetour['pac_location']) {
							$sys_province_checked = 'selected="selected" ';
						echo $Rrecordarray_sys_province_name_th[$num_prov];
						}
					}
					?>
					
				</h5>
			  </p>

				<p>
					<h2><?php echo $Recordassoc_packagetour['pac_day']; ?>  วัน <?php echo $Recordassoc_packagetour['pac_night']; ?> คืน  </h2>
				</p>
				
				<p>
				  <h1>ผู้ใหญ่ <?php echo $Recordassoc_packagetour['pac_adult_retail_price']; ?>  บาท เด็ก  <?php echo $Recordassoc_packagetour['pac_child_retail_price']; ?>  บาท </h1>
				</p>

				<p>
				  <h4>(ราคาขายส่ง ผู้ใหญ่ <?php echo $Recordassoc_packagetour['pac_adult_wholesale_price']; ?>  บาท เด็ก  <?php echo $Recordassoc_packagetour['pac_child_wholesale_price']; ?>  บาท )</h4>
				</p>

			  
			  <p>
				  <h4>รับลูกทัวร์วันละ  <?php echo $Recordassoc_packagetour['pac_peo_limit']; ?> ท่าน โดยจองขั้นต่ำ <?php echo $Recordassoc_packagetour['pac_peo_min']; ?> ท่านขึ้นไป</h4>
			  </p>
			  
			  <p>
					<h4>เริ่มต้นทัวร์เวลา  <?php echo $Recordassoc_packagetour['pac_app_time']; ?> น. ที่จุดนัดพบ  <?php echo $Recordassoc_packagetour['pac_location_app']; ?></h4>
					<p>&emsp;&emsp;<?php echo $Recordassoc_packagetour['pac_des_th']; ?></p>
			  </p>
			  
			  <p>
				  <label>SEO Keyword: <?php echo $Recordassoc_packagetour['pac_keyword_th']; ?></label>
			  </p>
			  
			  <div class="w3-container">
				<div class="w3-half">
					<label><u>สิ่งอำนวยความสะดวก</u></label>
			<?php
					for ($num_fac = 0; $num_fac < count($Rrecordarray_facility_option_id); $num_fac++) {
						$Fac_checked = "";
						for($Fac_checker_select = 0; $Fac_checker_select < count($Fac_selected); $Fac_checker_select++) {
							if ($Fac_selected[$Fac_checker_select] ==  $Rrecordarray_facility_option_id[$num_fac]) {
								$Fac_checked = "checked";
							}
						}
							echo '<p><input disabled class="w3-check" type="checkbox" name="Fac_'.$Rrecordarray_facility_option_id[$num_fac].'" id="Fac_'.$Rrecordarray_facility_option_id[$num_fac].'" '.$Fac_checked.'><label>'.$Rrecordarray_facility_option_name_th[$num_fac].'</label></p>';
						
					}  ?>
				</div>
				<div class="w3-half">
					<label><u>ความปลอดภัย</u></label>
			<?php
					for ($num_saf = 0; $num_saf < count($Rrecordarray_safety_option_id); $num_saf++) {
						$Saf_checked = "";
						for($Saf_checker = 0; $Saf_checker < count($Saf_selected); $Saf_checker++) {
							if ($Saf_selected[$Saf_checker] ==  $Rrecordarray_safety_option_id[$num_saf]) {
								$Saf_checked = "checked";
							}
						}
						echo '<p><input disabled class="w3-check" type="checkbox" name="Safe_'.$Rrecordarray_safety_option_id[$num_saf].'" id="Safe_'.$Rrecordarray_safety_option_id[$num_saf].'" '.$Saf_checked.'><label>'.$Rrecordarray_safety_option_name_th[$num_saf].'</label></p>';
					} ?>
				</div>
			  </div>
				<div class="w3-container w3-padding-32 w3-white">
					&nbsp;
				</div>			  
			
			</form>  

						<?php include 'add_edit_package_detail_popup.php'; ?>

							<div class="">
							<p >
								<div class="w3-quarter">
									&nbsp;
								</div>
								<div class="w3-center w3-half">
									  <h2>แก้ไขรายละเอียด   &nbsp;</h2>
								</div>
								<div class="w3-quarter">
									  <p id="edit_pk_det" onclick="document.getElementById('add_detail_0').style.display='block'" class="w3-text-green fa fa-plus-circle fa-lg w3-right" aria-hidden="true" > เพิ่มกิจกรรม</p>
								</div>
							</p>
							
								<div class="w3-container w3-white">
									&nbsp;
								</div>

							
							   <table class="w3-table w3-striped" id="dynamic_field"> 
                            <?php
								$count_row4color=0;
								while ($Recordassoc_pac_detail = mysqli_fetch_assoc($Recordset_pac_detail)) {
									$show_time = explode(":",$Recordassoc_pac_detail['pac_detail_time']);
							?> 
										<div class="w3-row <?php if($count_row4color%2==0){echo 'w3-light-grey';}?>" >
											<div class="w3-container w3-third w3-center ">
												<img src="../<?php echo $Recordassoc_pac_detail['pac_detail_pic']; ?>" class="w3-border " style="padding:4px;width:100%;">
											</div>
											<div class="w3-container w3-twothird">
												<h4>วันที่ <?php echo $Recordassoc_pac_detail['pac_detail_date']; ?> เวลา <?php echo $show_time[0].':'.$show_time[1]; ?>
												<button type="button" class="w3-button w3-large w3-hover-red w3-text-red w3-right" id="edit_pk_det" onclick="document.getElementById('add_detail_<?php echo $Recordassoc_pac_detail['pac_detail_id']; ?>').style.display='block'" ><i class="w3-text-green fa fa-pencil-square-o fa-lg w3-right" aria-hidden="true" > แก้ไข</i></button></h4>
												<p><?php echo $Recordassoc_pac_detail['pac_detail_des_th']; ?></p>
												<button type="button" class="w3-button w3-large w3-hover-red w3-text-red w3-right" onclick="window.location.href='insert_delete_detail_function.php?page_from=edit_package&pac_code=<?php echo $pac_code; ?>&add_det=-1&detid=<?php echo $Recordassoc_pac_detail['pac_detail_id']; ?>'"><i class="fa fa-trash" aria-hidden="true">ลบ</i></button>
											</div>
										</div>
										<div class="">&nbsp;</div><!---ช่องว่างเฉยๆ---->
							
								<?php 
								include "add_edit_package_detail_popup.php";
								$count_row4color = $count_row4color + 1;
								} ?>
							   </table> 
							   
							   <p>&nbsp;</p>
							   
							</div> 		
		</div>

		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
		<div class="w3-quarter w3-container">
		  &nbsp;
		</div>
		
		
		<div class="w3-white w3-container w3-padding-32">		
			<?php
				$thaimonth=array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
				echo '<h2 class="w3-center">เดือน '.$thaimonth[date("n")].' ปี '.date("Y").'</h2>';
			?>
			<input type="hidden" name="pac_id" value="<?php echo $pac_id; ?>">
			<table>
			  <col width="14%">
			  <col width="14%">
			  <col width="14%">
			  <col width="14%">
			  <col width="14%">
			  <col width="14%">
			  <col width="14%">
			  <tr class="w3-pale-red">
				<th class="w3-center">จันทร์</th>
				<th class="w3-center">อังคาร</th>
				<th class="w3-center">พุธ</th>
				<th class="w3-center">พฤหัส</th>
				<th class="w3-center">ศุกร์</th>
				<th class="w3-center">เสาร์</th>
				<th class="w3-center">อาทิตย์</th>
			  </tr>
<?php 
				while ($Recordassoc_pac_daily_price = mysqli_fetch_assoc($Recordset_pac_daily_price)) {
					$pac_daily_price_id = $Recordassoc_pac_daily_price['pac_daily_price_id'];
					$pac_daily_price_explode = explode("-", $pac_daily_price_id);
					$pac_daily_price_date[] = $pac_daily_price_explode[2];
					$adult_price[] = $Recordassoc_pac_daily_price['adult_price'];
					$child_price[] = $Recordassoc_pac_daily_price['child_price'];
					$peo_limit[] = $Recordassoc_pac_daily_price['peo_limit'];
				}
				$day_week = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
				$date_today = date("d");
				for ($day_row = 1; $day_row <= cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")); $day_row++) {
					$day_ofdate = date('D', strtotime(date("Y")."-".date("m")."-".$day_row)); 
						if ($day_ofdate == 'Mon') {
							echo "<tr>";
						}
						if ($day_row == 1) {
							for ($i = '0'; $i < array_search($day_ofdate, $day_week); $i++) {
								echo '<td></td>'; 
							}
						}
						echo "<td class=";
						if ($day_row < date("d")) {
							echo 'w3-red>';
							$first_table_hidden = 'hidden';
						}else {
							echo '>';
							$first_table_hidden = '';
						}
						$index = array_search($day_row,array_values($pac_daily_price_date));
						echo '<div class="w3-half">&nbsp;</div> <div class="w3-half w3-right-align"><h3>'.$day_row.'</h3></div>'
							.'<div '.$first_table_hidden.'>'.'<div class="w3-half w3-right-align">ผู้ใหญ่</div><div class="w3-half"><input disabled class="w3-input w3-right-align" type="number" name="adult_'.$day_row.date("m").'" value="'.$adult_price[$index].'"></div>'
							.'<div class="w3-half w3-right-align">เด็ก</div><div class="w3-half"><input disabled class="w3-input w3-right-align" type="number" name="child_'.$day_row.date("m").'" value="'.$child_price[$index].'"></div>'
							.'<div class="w3-half w3-right-align">จำนวนรับ</div><div class="w3-half"><input disabled class="w3-input w3-right-align" type="number" name="peo_limit_'.$day_row.date("m").'" value="'.$peo_limit[$index].'"></div>'
							.'</div></td>';
						if ($day_ofdate == 'Sun') {
							echo "</tr>";
						}
				}
?>
		</table>
		</div>
		<!--<p class="w3-center"><button disabled class="w3-button w3-green w3-round-xlarge w3-large"  style="width:40%" type="submit">บันทึก</button></p>-->
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
	
	<?php include 'footer.php'; ?>
	<script>
	function enableEdit(E_array) {
		for (i=0;i<E_array.length;i++) {
			document.getElementById(E_array[i]).disabled = false;
		}
	}
	var uploadField = document.getElementById("tour_pic");

		uploadField.onchange = function() {
			if(this.files[0].size > 1200000){
			   alert("ภาพต้องไม่เกิน 1.1  MB!");
			   this.value = "";
			};
		};
	</script>
  </body>
</html>
