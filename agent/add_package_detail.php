<?php
	$pac_code = $_GET['pac_code'];
	$pac_id = base_convert($pac_code, 36, 10);
	date_default_timezone_set("Asia/Bangkok");
	
	require_once("../con_database/key.php");
	$query = "SELECT * FROM pac_detail WHERE pac_id = '".$pac_id."' ORDER BY pac_detail_date ASC, pac_detail_time ASC";
	$Recordset_pac_detail = mysqli_query($conn,$query);
	$page_from = 'add_package_detail';
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
		
		<div class="w3-quarter-body w3-container">
		  &nbsp;
		</div>
		
		<?php include 'add_edit_package_detail_popup.php'; ?>
		
		<div class="w3-half-body w3-container ">
		<h2 class="w3-center">รายละเอียด/กิจกรรม</h2>
			<div class="w3-hide-small">	
				<div class="w3-container w3-third w3-center w3-red">
					<label>ภาพประกอบ</label>
				</div>
				<div class="w3-container w3-twothird w3-center w3-red">
					<label>รายละเอียด</label>
				</div>
			</div>
			
			<div class="">&nbsp;</div><!---ช่องว่างเฉยๆ---->
			
			<?php while ($Recordassoc_pac_detail = mysqli_fetch_assoc($Recordset_pac_detail)) {
				$show_time = explode(":",$Recordassoc_pac_detail['pac_detail_time']);
			?>
			<div class="w3-row">
				<div class="w3-container w3-third w3-center ">
					<img src="../<?php echo $Recordassoc_pac_detail['pac_detail_pic']; ?>" class="w3-border " style="padding:4px;width:100%;">
				</div>
				<div class="w3-container w3-twothird ">
					<h4>วันที่ <?php echo $Recordassoc_pac_detail['pac_detail_date']; ?> เวลา <?php echo $show_time[0].':'.$show_time[1]; ?>
					<button type="button" class="w3-button w3-large w3-hover-red w3-text-red w3-right" onclick="window.location.href='insert_delete_detail_function.php?page_from=add_package_detail&pac_code=<?php echo $pac_code; ?>&add_det=-1&detid=<?php echo $Recordassoc_pac_detail['pac_detail_id']; ?>'"><i class="fa fa-trash" aria-hidden="true">ลบ</i></button></h4>
					<p><?php echo $Recordassoc_pac_detail['pac_detail_des_th']; ?></p>
					<p id="edit_pk_det" onclick="document.getElementById('add_detail_<?php echo $Recordassoc_pac_detail['pac_detail_id']; ?>').style.display='block'" class="w3-text-green fa fa-plus-circle fa-lg w3-right" aria-hidden="true" > EDIT</p>
				</div>
			</div>
			<div class="">&nbsp;</div><!---ช่องว่างเฉยๆ---->
			<?php } ?>
			
			<div class="w3-bar w3-padding-16">
				<button class="w3-button w3-green w3-round-xlarge w3-left" style="width:30%" type="button" onclick="window.location.href='add_package_price.php?pac_code=<?php echo $pac_code; ?>'" class="btn btn-success">ต่อไป>></button>
				<button class="w3-button w3-teal w3-round-xlarge w3-right" type="button" onclick="document.getElementById('add_detail_0').style.display='block'" style="width:30%" >+ เพิ่มกิจกรรม</button>
			</div>
			
		</div>
		
		<div class="w3-quarter-body w3-container">
		  &nbsp;
		</div>
		
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
		
	<?php include 'footer.php'; ?>

 </body>
</html>