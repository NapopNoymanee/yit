<?php 
require_once("../con_database/key.php"); 
date_default_timezone_set("Asia/Bangkok");
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
	
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
		
		<div class="w3-quarter w3-container">
		  &nbsp;
		</div>
		
		<div class="w3-half w3-container ">
			<form class="w3-white" method="post" enctype="multipart/form-data" action="insert_package_function.php" >
			  <h2 class="w3-center">เพิ่มแพคเกจทัวร์</h2>

			  <p>
				  <label>ภาพหน้าปก</label>
				  <input class="w3-input w3-border w3-round-large" name="tour_pic" id="tour_pic" type="file" accept="image/png, image/jpeg" required>
			  </p>
			  
			  <p>
				  <label>ประเภททัวร์</label>
					<select class="w3-select w3-border w3-round-large" name="tour_type" required>
			
						<option value="" disabled selected>กรุณาเลือกประเภท...</option>
						<?php 
						$queryTour_type = "SELECT * FROM tour_type";
						$RecordsetTour_type = mysqli_query($conn,$queryTour_type);
						while ($row_RecordsetTour_type = mysqli_fetch_assoc($RecordsetTour_type)) { ?>
						<option value="<?php echo $row_RecordsetTour_type['tour_type_id']; ?>"><?php echo $row_RecordsetTour_type['tour_type_name_th']; ?></option>
						<?php } ?>
					</select>
			  </p>
			  <p>
				  <label>จังหวัด</label>
					<select class="w3-select w3-border w3-round-large" name="province" required>
						<option value="" disabled selected>กรุณาเลือกจังหวัด...</option>
			<?php
					$queryProv = "SELECT * FROM sys_province";
					$RecordsetProv = mysqli_query($conn,$queryProv);
					while ($row_RecordsetProv = mysqli_fetch_assoc($RecordsetProv)) {
			?>
						<option value="<?php echo $row_RecordsetProv['prov_id']; ?>"><?php echo $row_RecordsetProv['prov_name_th']; ?></option>
			<?php } ?>
					</select>
			  </p>
			  
			  <p>
				  <label>ชื่อแพคเกจ</label>
				  <input class="w3-input w3-border w3-round-large" name="package_name" type="text" required>
			  </p>
			  
			  <p>
					<label>ระยะเวลา (วัน/คืน)</label>
					  <div class="w3-half w3-padding-small">
						<input class="w3-input w3-border w3-round-large" name="duration_day" type="text" placeholder="จำนวนวัน" required>
					  </div>
					  <div class="w3-half w3-padding-small">
						<input class="w3-input w3-border w3-round-large" name="duration_night" type="text" placeholder="จำนวนคืน" >
					  </div>
				</p>
				<br><br>
				<p>
					<label>เวลานัด</label>
					<div class="w3-half">
						<input class="w3-input w3-border w3-round-large" style="width:30%; display: inline;" name="duration_hour" type="number" min="0" max="23" placeholder="13" required> :
						<input class="w3-input w3-border w3-round-large" style="width:30%; display: inline;" name="duration_minute" type="number" min="0" max="59" placeholder="30" required> น.
					</div>
				</p>
				<br><br><br><br>
							  
			  <div class="w3-container">
				<div class="w3-half">
					<label><u>สิ่งอำนวยความสะดวก</u></label>
			<?php 
					$queryFac = "SELECT * FROM `facility_option` WHERE 1";
					$RecordsetFac = mysqli_query($conn,$queryFac);
					while ($row_RecordsetFac = mysqli_fetch_assoc($RecordsetFac)) {
			?>
						<p><input class="w3-check" type="checkbox" name="Fac_<?php echo $row_RecordsetFac['fac_option_id']; ?>"><label> <?php echo $row_RecordsetFac['fac_name_th']; ?></label></p>
			<?php }  ?>
				</div>
				<div class="w3-half">
					<label><u>ความปลอดภัย</u></label>
			<?php
					$querySafe = "SELECT * FROM safety_option";
					$RecordsetSafe = mysqli_query($conn,$querySafe);
					while ($row_RecordsetSafe = mysqli_fetch_assoc($RecordsetSafe)) {
			?>
					<p><input class="w3-check" type="checkbox" name="Safe_<?php echo $row_RecordsetSafe['safety_option_id']; ?>"><label> <?php echo $row_RecordsetSafe['safety_name_th']; ?></label></p>
			<?php } ?>
				</div>
			  </div>
			  
			  
			  <p><label>* กำหนดให้ "เด็ก" คือผู้ที่มีช่วงอายุ 7-12 ปี และ "ผู้ใหญ่" คือผู้ที่มีอายุมากกว่า 12 ปี และสุขภาพแข็งแรง</label></p>
			  <p>
				  <label>ราคาขายส่ง (ผู้ใหญ่/เด็ก) ให้แก่ยี่เทียนทัวร์</label>
					  <div class="w3-half w3-padding-small">
						<input class="w3-input w3-border w3-round-large" type="number" name="pac_adult_wholesale_price" placeholder="ราคาขายส่งผู้ใหญ่" required>
					  </div>
					  <div class="w3-half w3-padding-small">
						<input class="w3-input w3-border w3-round-large" type="number" name="pac_child_wholesale_price" placeholder="ราคาขายส่งเด็ก" required>
					  </div>
			  </p>
			  
			  <p>&nbsp;</p>
			  
			  <p>
				  <label>ราคาขายปลีก (ผู้ใหญ่/เด็ก)</label>
					  <div class="w3-half w3-padding-small">
						<input class="w3-input w3-border w3-round-large" type="number" name="pac_adult_retail_price" placeholder="ราคาขายปลีกผู้ใหญ่" required>
					  </div>
					  <div class="w3-half w3-padding-small">
						<input class="w3-input w3-border w3-round-large" type="number" name="pac_child_retail_price" placeholder="ราคาขายปลีกเด็ก" require>
					  </div>
			  </p>
			  <p>&nbsp;</p>
			  
			  <p>
				  <label>จำนวนจองขั้นต่ำ (...ท่านขึ้นไป)</label>
				  <input class="w3-input w3-border w3-round-large" name="pac_peo_min" value="1" type="number" min="1" required>
			  </p>
			  
			  <p>
				  <label>จำนวนที่เปิดให้จอง</label>
				  <input class="w3-input w3-border w3-round-large" name="pac_peo_limit" type="number" min="1" placeholder="จำนวนที่เปิดให้จอง" required>
			  </p>
			  
			  <p>
				  <label>จุดนัดพบ</label>
				  <input class="w3-input w3-border w3-round-large" name="pac_location_app" placeholder="กรุณาใส่ที่อยู่" required>
			  </p>
			  
			  <p>
				  <label>คำอธิบายแพคเกจ</label>
				  <textarea rows="4" class="w3-input w3-border w3-round-large" name="pac_des_th" placeholder="คำอธิบายแพคเกจ เป็นภาษาไทย หรือภาษาจีน" required></textarea>
			  </p>
			  
			  <p>
				  <label>SEO Keyword คำค้นหา ใส่/คั่นระหว่างคำ</label>
				  <input class="w3-input w3-border w3-round-large" name="pac_keyword_th" type="text" placeholder="เที่ยวไทย/เที่ยวเกาะ/ทัวร์จีน" required>
			  </p>
			  			  
			   <p class="w3-center"><button class="w3-button w3-green w3-round-xlarge w3-large" type="submit">ต่อไป >></button></p>
			</form>
		</div>
		
		<div class="w3-quarter w3-container">
		  &nbsp;
		</div>
		
		
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
	
	<?php include 'footer.php'; ?>
	<script>
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
