
<?php
	if (isset($Recordassoc_pac_detail['pac_detail_id'])) {
		$add_det = '0';
		$det_id = $Recordassoc_pac_detail['pac_detail_id'];
		$det_date = $Recordassoc_pac_detail['pac_detail_date'];
		$det_time = [$show_time[0],$show_time[1]];
		$det_pic = $Recordassoc_pac_detail['pac_detail_pic'];
		$det_des_th = $Recordassoc_pac_detail['pac_detail_des_th'];
	}else {
		$add_det = '1';
		$det_id = '0';
		$det_date = '';
		$det_time = ['',''];
		$det_pic = '';
		$det_des_th = '';
	}
?>
<!-------------------modal----add detail---------------->
		<div id="add_detail_<?php echo $det_id; ?>" class="w3-modal">
		<form action="insert_delete_detail_function.php?pac_code=<?php echo $pac_code; ?>&add_det=<?php echo $add_det; ?>&page_from=<?php echo $page_from; ?>&detid=<?php echo $det_id; ?>" method="post" enctype="multipart/form-data" >
			<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
			  <div class="w3-center"><br>
				<span onclick="document.getElementById('add_detail_<?php echo $det_id; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close">&times;</span>
			  </div>
				<div class="w3-section ">
					<div class="w3-row-padding">
							<div class="w3-row">
								<!--input  class="w3-input w3-border w3-round-large" name="topic" id="topic" type="text" placeholder="วัน-เวลา" value="<?php //echo $det_name_th; ?>" required-->
								<div class="w3-half w3-padding-small">
									<label>วันที่</label>
										<input class="w3-input w3-border w3-round-large" name="det_date" placeholder="วันที่ 1" type="number" value="<?php echo $det_date; ?>" required>
								</div>
								<div class="w3-half w3-padding-small">
									<label style="width:30%; display: block;" >เวลา</label>
										<input class="w3-input w3-border w3-round-large" style="width:30%; display: inline;" name="det_time_hour" type="number" min="0" max="23" placeholder="13" value="<?php echo $det_time[0]; ?>" required> :
										<input class="w3-input w3-border w3-round-large" style="width:30%; display: inline;" name="det_time_minute" type="number" min="0" max="59" placeholder="30" value="<?php echo $det_time[1]; ?>" required> น.
								</div>
							</div>
							<p>
								<label>ภาพประกอบ</label>
								<input  class="w3-input w3-border w3-round-large" name="pic" id="pic" type="file" value="<?php echo $det_pic; ?>" accept="image/png, image/jpeg">
							</p>
							<p>
								<label>รายละเอียด</label>
								<textarea  rows="3" class="w3-input w3-border w3-round-large" name="detail" id="detail" placeholder="คำอธิบาย เป็นภาษาไทย หรือภาษาจีน" required><?php echo $det_des_th; ?></textarea>
							</p>
					</div>
				</div>
			  <div class="w3-container w3-border-top w3-padding-16 w3-light-grey" style="height: 60px">
				<button onclick="document.getElementById('add_detail_<?php echo $det_id; ?>').style.display='none'" type="button" class="w3-button w3-red w3-round-large w3-display-bottomleft" style="margin: 0px 0px 10px 10px;" >ยกเลิก</button>
				<button  type="submit" class="w3-button w3-green w3-round-large w3-display-bottomright"style="margin: 0px 10px 10px 0px;">ตกลง</button>
			  </div>
			</div>
			</form>
		  </div>
<!---------------end----modal----add--------------------->