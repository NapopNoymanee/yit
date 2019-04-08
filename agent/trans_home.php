<?php
	require_once("../con_database/key.php");
	function toQuery($pid, $conn) {
	$queryTrans_0 = "SELECT pac_name_cn, pac_des_cn, pac_keyword_cn, pac_name_th, pac_des_th, pac_keyword_th FROM packagetour WHERE pac_id = '".$pid."'";
	$queryTrans_1 = "SELECT pac_detail_name_cn, pac_detail_des_cn, pac_detail_name_th, pac_detail_des_th FROM pac_detail WHERE pac_id = '".$pid."'";
	$queryget_0 = mysqli_query($conn,$queryTrans_0);
	$queryget_1 = mysqli_query($conn,$queryTrans_1);
	$count_channel_0 = ((1+10+5) * mysqli_num_rows($queryget_0));
	$count_channel_1 = ((10+10) * mysqli_num_rows($queryget_1));
	$null_channel_0 = 0;
	$null_channel_1 = 0;
	$lenght_char_0 = 0;
	$lenght_char_1 = 0;
	while ($row_assoc = mysqli_fetch_assoc($queryget_0)) {
		if (is_null($row_assoc['pac_name_cn'])) {
			$null_channel_0 = $null_channel_0 + 1;
			$lenght_char_0 = $lenght_char_0 + strlen($row_assoc['pac_name_th']);
		}
		if (is_null($row_assoc['pac_des_cn'])) {
			$null_channel_0 = $null_channel_0 + 10;
			$lenght_char_0 = $lenght_char_0 + strlen($row_assoc['pac_des_th']);
		}
		if (is_null($row_assoc['pac_keyword_cn'])) {
			$null_channel_0 = $null_channel_0 + 5;
			$lenght_char_0 = $lenght_char_0 + strlen($row_assoc['pac_keyword_th']);
		}
	}
	while ($row_assoc = mysqli_fetch_assoc($queryget_1)) {
		if (is_null($row_assoc['pac_detail_name_cn'])) {
			$null_channel_1 = $null_channel_1 + 10;
			$lenght_char_1 = $lenght_char_1 + strlen($row_assoc['pac_detail_name_th']);
		}
		if (is_null($row_assoc['pac_detail_des_cn'])) {
			$null_channel_1 = $null_channel_1 + 10;
			$lenght_char_1 = $lenght_char_1 + strlen($row_assoc['pac_detail_des_th']);
		}
	}
	$percent_complete = 100 - (100*($null_channel_0+$null_channel_1)/($count_channel_0+$count_channel_1));
	}//echo $percent_complete;
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
		
		<div class="w3-half-body w3-container ">
		
		
			<div class=" w3-bar w3-round-large w3-teal w3-center" >
			  <h2>งานแปลของฉัน</h2>
			</div>
	
			
			<div class="w3-white">&nbsp;</div>
			<?php
				$query_id = "SELECT pac_id, pac_name_th FROM packagetour";
				$res_query_id = mysqli_query($conn,$query_id);
				while ($row_id = mysqli_fetch_assoc($res_query_id)) { 
						$queryTrans_0 = "SELECT pac_name_cn, pac_des_cn, pac_keyword_cn, pac_name_th, pac_des_th, pac_keyword_th FROM packagetour WHERE pac_id = '".$row_id['pac_id']."'";
						$queryTrans_1 = "SELECT pac_detail_name_cn, pac_detail_des_cn, pac_detail_name_th, pac_detail_des_th FROM pac_detail WHERE pac_id = '".$row_id['pac_id']."'";
						$queryget_0 = mysqli_query($conn,$queryTrans_0);
						$queryget_1 = mysqli_query($conn,$queryTrans_1);
						$count_channel_0 = ((1+10+5) * mysqli_num_rows($queryget_0));
						$count_channel_1 = ((10+10) * mysqli_num_rows($queryget_1));
						$null_channel_0 = 0;
						$null_channel_1 = 0;
						$lenght_char_0 = 0;
						$lenght_char_1 = 0;
						while ($row_assoc = mysqli_fetch_assoc($queryget_0)) {
							if (is_null($row_assoc['pac_name_cn'])) {
							$null_channel_0 = $null_channel_0 + 1;
							$lenght_char_0 = $lenght_char_0 + strlen($row_assoc['pac_name_th']);
						}
						if (is_null($row_assoc['pac_des_cn'])) {
							$null_channel_0 = $null_channel_0 + 10;
							$lenght_char_0 = $lenght_char_0 + strlen($row_assoc['pac_des_th']);
						}
						if (is_null($row_assoc['pac_keyword_cn'])) {
							$null_channel_0 = $null_channel_0 + 5;
							$lenght_char_0 = $lenght_char_0 + strlen($row_assoc['pac_keyword_th']);
						}
						}
						while ($row_assoc = mysqli_fetch_assoc($queryget_1)) {
							if (is_null($row_assoc['pac_detail_name_cn'])) {
							$null_channel_1 = $null_channel_1 + 10;
							$lenght_char_1 = $lenght_char_1 + strlen($row_assoc['pac_detail_name_th']);
						}
						if (is_null($row_assoc['pac_detail_des_cn'])) {
							$null_channel_1 = $null_channel_1 + 10;
							$lenght_char_1 = $lenght_char_1 + strlen($row_assoc['pac_detail_des_th']);
						}
					}
					$percent_complete = 100 - (100*($null_channel_0+$null_channel_1)/($count_channel_0+$count_channel_1));
					$lenght_char = $lenght_char_0+$lenght_char_1;
					echo $percent_complete;
			?>
			<a href="#" style="text-decoration: none">
				<div class="w3-panel w3-leftbar w3-border-blue w3-padding-16 w3-pale-blue">
				  <h4><?php echo $row_id['pac_name_th'];; ?></h4>
				  <h5>มีภาษาไทยที่ต้องแปลอีก <?php echo $lenght_char; ?> อักษร</h5>
					<div class="w3-light-blue w3-round-xxlarge">
					  <div class="w3-container w3-green w3-center w3-round-xxlarge" style="width:<?php echo intval($percent_complete); ?>%"><?php echo intval($percent_complete); ?>%</div>
					</div>
				</div>
				</a><?php } ?>
			

			<div class="w3-white">&nbsp;</div>
			<div class="w3-white">&nbsp;</div>
			
			
		</div>
		
		<div class="w3-quarter-body w3-container">
		  &nbsp;
		</div>
		
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>	
		
	<?php include 'footer.php'; ?>
  </body>
</html>
