	<!-------------------modal----add---using on edit_package.php------------->
		<div id="edit_pack" class="w3-modal">
		<form action="update_package_function.php?page_from=edit_package&pac_code=<?php echo $pac_code; ?>" method="post" enctype="multipart/form-data">
			<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
			  <div class="w3-center"><br>
				<span onclick="document.getElementById('edit_pack').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close">&times;</span>
			  </div>
				<div class="w3-section ">
					<div class="w3-row-padding">
						  <p>
							  <label>ชื่อแพคเกจ</label>
							  <input  class="w3-input w3-border w3-round-large" name="package_name" id="package_name" type="text" value="<?php echo $Recordassoc_packagetour['pac_name_th']; ?>" required>
						  </p>
						  
						  <p>
							  <label>ภาพหน้าปก</label>
							  <img src="../<?php echo $Recordassoc_packagetour['pac_picture']; ?>" style="width:100%" class="w3-padding">
							  <input  class="w3-input w3-border w3-round-large" name="tour_pic" id="tour_pic" type="file" accept="image/png, image/jpeg" required>
						  </p>
						  
			  <p>
				  <label>ประเภททัวร์</label>
					<select class="w3-select w3-border w3-round-large" name="tour_type" id="tour_type" required>
						<option value="0" disabled>กรุณาเลือกประเภท...</option>
					<?php
						for ($num_tour_type = 0; $num_tour_type < count($Recordarray_tour_type_id); $num_tour_type++) {
							if ($Recordarray_tour_type_id[$num_tour_type] == $Recordassoc_packagetour['pac_tour_type']) {
								$tour_type_checked = 'selected="selected" ';
							}else {
								$tour_type_checked = ' ';
							}
							echo '<option '.$tour_type_checked.'value="'.$Recordarray_tour_type_id[$num_tour_type].'">'.$Recordarray_tour_type_name_th[$num_tour_type].'</option>';
						}
					?>
					</select>
			  </p>
			  <p>
				  <label>จังหวัด</label>
					<select class="w3-select w3-border w3-round-large" name="province" id="province" required>
						<option value="0" disabled>กรุณาเลือกจังหวัด...</option>
				<?php
					for ($num_prov = 0; $num_prov < count($Rrecordarray_sys_province_id); $num_prov++) {
						if ($Rrecordarray_sys_province_id[$num_prov] == $Recordassoc_packagetour['pac_location']) {
							$sys_province_checked = 'selected="selected" ';
						}else {
							$sys_province_checked = ' ';
						}
						echo '<option '.$sys_province_checked.'value='.$Rrecordarray_sys_province_id[$num_prov].'>'.$Rrecordarray_sys_province_name_th[$num_prov].'</option>';
					}
				?>
					</select>
			  </p>

						  <p>
								<label>ระยะเวลา (วัน/คืน)</label>
								  <div class="w3-half w3-padding-small">
									<input  class="w3-input w3-border w3-round-large" name="duration_day" id="duration_day" type="text" value="<?php echo $Recordassoc_packagetour['pac_day']; ?>" placeholder="จำนวนวัน" required>
								  </div>
								  <div class="w3-half w3-padding-small">
									<input  class="w3-input w3-border w3-round-large" name="duration_night" id="duration_night" type="text" value="<?php echo $Recordassoc_packagetour['pac_night']; ?>" placeholder="จำนวนคืน" >
								  </div>
							</p>
							<br><br>
							<p>
								<label>ระยะเวลานัด</label>
								<div class="w3-half">
								<?php $app_time = explode(":", $Recordassoc_packagetour['pac_app_time']); ?>
									<input  class="w3-input w3-border w3-round-large" style="width:30%; display: inline;" name="duration_hour" id="duration_hour" type="number" value="<?php echo $app_time[0]; ?>" min="0" max="23" placeholder="13" required> :
									<input  class="w3-input w3-border w3-round-large" style="width:30%; display: inline;" name="duration_minute" id="duration_minute" type="number" value="<?php echo $app_time[1]; ?>" min="0" max="59" placeholder="30" required> น.
								</div>
							</p>
							<br><br><br><br>
										  
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
							echo '<p><input class="w3-check" type="checkbox" name="Fac_'.$Rrecordarray_facility_option_id[$num_fac].'" id="Fac_'.$Rrecordarray_facility_option_id[$num_fac].'" '.$Fac_checked.'><label>'.$Rrecordarray_facility_option_name_th[$num_fac].'</label></p>';
						
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
						echo '<p><input class="w3-check" type="checkbox" name="Safe_'.$Rrecordarray_safety_option_id[$num_saf].'" id="Safe_'.$Rrecordarray_safety_option_id[$num_saf].'" onclick="Fac_checkbox()" '.$Saf_checked.'><label>'.$Rrecordarray_safety_option_name_th[$num_saf].'</label></p>';
					} ?>
				</div>
			  </div>
						  
						  
						  <p>&nbsp;</p>
						  
						  <p>
							  <label>ราคาขายส่ง (ผู้ใหญ่/เด็ก)</label>
								  <div class="w3-half w3-padding-small">
									<input   class="w3-input w3-border w3-round-large" type="number" name="pac_adult_wholesale_price" id="pac_adult_wholesale_price" placeholder="ราคาขายส่งผู้ใหญ่" value="<?php echo $Recordassoc_packagetour['pac_adult_wholesale_price']; ?>" required>
								  </div>
								  <div class="w3-half w3-padding-small">
									<input  class="w3-input w3-border w3-round-large" type="number" name="pac_child_wholesale_price" id="pac_child_wholesale_price" placeholder="ราคาขายส่งเด็ก" value="<?php echo $Recordassoc_packagetour['pac_child_wholesale_price']; ?>" required>
								  </div>
						  </p>
						  
						  <p>&nbsp;</p>
						  
						  <p>
							  <label>ราคาขายปลีก (ผู้ใหญ่/เด็ก)</label>
								  <div class="w3-half w3-padding-small">
									<input  class="w3-input w3-border w3-round-large" type="number" name="pac_adult_retail_price" id="pac_adult_retail_price" placeholder="ราคาขายปลีกผู้ใหญ่" value="<?php echo $Recordassoc_packagetour['pac_adult_retail_price']; ?>" required>
								  </div>
								  <div class="w3-half w3-padding-small">
									<input  class="w3-input w3-border w3-round-large" type="number" name="pac_child_retail_price" id="pac_child_retail_price" placeholder="ราคาขายปลีกเด็ก" value="<?php echo $Recordassoc_packagetour['pac_child_retail_price']; ?>" require>
								  </div>
						  </p>
						  
						  <p>&nbsp;</p>
						  
						  <p>
							  <label>จำนวนจองขั้นต่ำ (...ท่านขึ้นไป)</label>
							  <input  class="w3-input w3-border w3-round-large" name="pac_peo_min" id="pac_peo_min" type="number" min="1" value="<?php echo $Recordassoc_packagetour['pac_peo_min']; ?>" required>
						  </p>
						  
						  <p>
							  <label>จำนวนที่เปิดให้จอง</label>
							  <input  class="w3-input w3-border w3-round-large" name="pac_peo_limit" id="pac_peo_limit" type="number" min="1"  value="<?php echo $Recordassoc_packagetour['pac_peo_limit']; ?>" placeholder="จำนวนที่เปิดให้จอง" required>
						  </p>
						  
						  <p>
							  <label>จุดนัดพบ</label>
							  <input  class="w3-input w3-border w3-round-large" name="pac_location_app" id="pac_location_app" placeholder="กรุณาใส่ที่อยู่"  value="<?php echo $Recordassoc_packagetour['pac_location_app']; ?>" required>
						  </p>
						  
						  <p>
							  <label>คำอธิบายแพคเกจ</label>
							  <textarea  rows="4" class="w3-input w3-border w3-round-large" name="pac_des_th" id="pac_des_th" placeholder="คำอธิบายแพคเกจ เป็นภาษาไทย หรือภาษาจีน" required><?php echo $Recordassoc_packagetour['pac_des_th']; ?></textarea>
						  </p>
						  
						  <p>
							  <label>SEO Keyword คำค้นหา ใส่/คั่นระหว่างคำ</label>
							  <input  class="w3-input w3-border w3-round-large" name="pac_keyword_th" id="pac_keyword_th" type="text" placeholder="เที่ยวไทย/เที่ยวเกาะ/ทัวร์จีน"  value="<?php echo $Recordassoc_packagetour['pac_keyword_th']; ?>" required>
						  </p>
					</div>
				</div>
			  <div class="w3-container w3-border-top w3-padding-16 w3-light-grey" style="height: 60px">
				<button onclick="document.getElementById('edit_pack').style.display='none'" type="button" class="w3-button w3-red w3-round-large w3-display-bottomleft" style="margin: 0px 0px 10px 10px;" >ยกเลิก</button>
				<button  type="submit" class="w3-button w3-green w3-round-large w3-display-bottomright"style="margin: 0px 10px 10px 0px;">ตกลง</button>
			  </div>
			</div>
		</form>
		</div>
<!---------------end----modal----add--------------------->
