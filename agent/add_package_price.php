<?php
	$pac_code = $_GET['pac_code'];
	$pac_id = base_convert($pac_code, 36, 10);

	date_default_timezone_set("Asia/Bangkok");
	if ((date("m")+1) > 12) {
		$year = date("Y")+1;
	}else {
		$year = date("Y");
	}
	
	require_once("../con_database/key.php"); 
	$queryPK = "SELECT pac_adult_retail_price, pac_child_retail_price, pac_peo_limit FROM packagetour WHERE pac_id = '".$pac_id."'";
	$RecordsetPK = mysqli_query($conn,$queryPK);
	$PK_array = mysqli_fetch_assoc($RecordsetPK);
	
?>
<!doctype html>
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

	<style>
		table {
		  width:100%;
		}
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		}
		th, td {
		  padding: 15px;
		  text-align: left;
		}
		table#t01 tr:nth-child(even) {
		  background-color: #eee;
		}
		table#t01 tr:nth-child(odd) {
		 background-color: #fff;
		}
		table#t01 th {
		  background-color: black;
		  color: white;
		}
	</style>



  </head>
 
 	<body class="bg-light">
    <?php include 'navbar.php'; 
	
	$thaimonth=array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
	
	?>
	
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
		
		<div class="w3-panel w3-pale-yellow w3-border">
		  <h3>ข้อกำหนด!</h3>
		  <p>&#8594; ให้ทำการกรอกข้อมูลหน้านี้ในหน้าจอคอมฯ หรือจอมือถือในแนวนอน จะสะดวกกว่า</p>
		  <p>&#8594; หากต้องการกำหนดว่าไม่ขายในวันใดๆ ให้ใส่จำนวนรับในวันนั้น เป็น 0 คน</p>
		  <p>&#8594; กำหนดให้ใส่ข้อมูลขายเป็นรายเดือนเพื่อป้องกันความผิดพลาดด้านการจัดการ</p>
		</div>
		
		<div class="w3-white w3-container w3-padding-32">		
		<form action="insert_daily_price_function.php?pac_code=<?php echo $pac_code; ?>" method="post"> 
			<?php
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
						/*echo '<div class="w3-half">&nbsp;</div> <div class="w3-half w3-right-align"><h3>'.$day_row.'</h3></div>'
							.'<div '.$first_table_hidden.'>'.'<div class="w3-half w3-right-align">ผู้ใหญ่</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="adult_'.$day_row.date("m").'" value="'.$PK_array['pac_adult_retail_price'].'"></div>'
							.'<div class="w3-half w3-right-align">เด็ก</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="child_'.$day_row.date("m").'" value="'.$PK_array['pac_child_retail_price'].'"></div>'
							.'<div class="w3-half w3-right-align">จำนวนรับ</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="peo_limit_'.$day_row.date("m").'" value="'.$PK_array['pac_peo_limit'].'"></div>'
							.'</div></td>';*/
							$this_month_num = intval(date("m"));
						?>
							<div class="w3-half">&nbsp;</div> <div class="w3-half w3-right-align"><h3><?php echo $day_row; ?></h3></div>
							<div <?php echo $first_table_hidden; ?>><div class="w3-half w3-right-align">ผู้ใหญ่</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="adult_<?php echo $day_row.'m'.$this_month_num; ?>" value="<?php echo $PK_array['pac_adult_retail_price']; ?>"></div>
							<div class="w3-half w3-right-align">เด็ก</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="child_<?php echo $day_row.'m'.$this_month_num; ?>" value="<?php echo $PK_array['pac_child_retail_price']; ?>"></div>
							<div class="w3-half w3-right-align">จำนวนรับ</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="peo_limit_<?php echo $day_row.'m'.$this_month_num; ?>" value="<?php echo $PK_array['pac_peo_limit']; ?>"></div>
							</div></td>
							
				<?php	if ($day_ofdate == 'Sun') {
							echo "</tr>";
						}
				}
			
		?>
  

		</table>
		<?php
			echo '<h2 class="w3-center">เดือน '.$thaimonth[date("n")+1].' ปี '.$year.'</h2>';
		?>
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
			for ($day_row = 1; $day_row <= cal_days_in_month(CAL_GREGORIAN, (date("m")+1)%12, $year); $day_row++) {
					$day_ofdate = date('D', strtotime(date("Y")."-".(date("m")+1)."-".$day_row)); 
						if ($day_ofdate == 'Mon') {
							echo "<tr>";
						}
						if ($day_row == 1) {
							for ($i = '0'; $i < array_search($day_ofdate, $day_week); $i++) {
								echo '<td></td>'; 
							}
						}
						echo "<td>";
						
						$first_table_hidden = '';
						
						/*echo '<div class="w3-half">&nbsp;</div> <div class="w3-half w3-right-align"><h3>'.$day_row.'</h3></div>'
							.'<div '.$first_table_hidden.'>'.'<div class="w3-half w3-right-align">ผู้ใหญ่</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="adult_'.$day_row.date("m").'" value="'.$PK_array['pac_adult_retail_price'].'"></div>'
							.'<div class="w3-half w3-right-align">เด็ก</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="child_'.$day_row.date("m").'" value="'.$PK_array['pac_child_retail_price'].'"></div>'
							.'<div class="w3-half w3-right-align">จำนวนรับ</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="peo_limit_'.$day_row.date("m").'" value="'.$PK_array['pac_peo_limit'].'"></div>'
							.'</div></td>';*/
							$next_month_num = intval(date("m"))+1;
						?>
							<div class="w3-half">&nbsp;</div> <div class="w3-half w3-right-align"><h3><?php echo $day_row; ?></h3></div>
							<div <?php echo $first_table_hidden; ?>><div class="w3-half w3-right-align">ผู้ใหญ่</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="adult_<?php echo $day_row.'m'.$next_month_num; ?>" value="<?php echo $PK_array['pac_adult_retail_price']; ?>"></div>
							<div class="w3-half w3-right-align">เด็ก</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="child_<?php echo $day_row.'m'.$next_month_num; ?>" value="<?php echo $PK_array['pac_child_retail_price']; ?>"></div>
							<div class="w3-half w3-right-align">จำนวนรับ</div><div class="w3-half"><input class="w3-input w3-right-align" type="number" name="peo_limit_<?php echo $day_row.'m'.$next_month_num; ?>" value="<?php echo $PK_array['pac_peo_limit']; ?>"></div>
							</div></td>
							
				<?php	if ($day_ofdate == 'Sun') {
							echo "</tr>";
						}
			}
?>
	</table>
		</div>
		
		<p class="w3-center"><button class="w3-button w3-green w3-round-xlarge w3-large"  style="width:40%" type="submit">บันทึก</button></p>
		</form>
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
	
	<?php include 'footer.php'; ?>
  </body>
</html>
