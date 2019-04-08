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
    <title>ลงทะเบียน</title>

  </head>
 
 	<body class="bg-light">
    <?php include 'navbar.php'; ?>
	
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
		
		<div class="w3-quarter w3-container">
		  &nbsp;
		</div>
		
		<div class="w3-half w3-row">
			<form class="w3-white" method="post" enctype="multipart/form-data" action="#" >
			  <h2 class="w3-center">ลงทะเบียน Register</h2>
			   
				<p>
					<label>อีเมลล์  E-mail</label><!-----Get form Facebook or manual input------->
					<input class="w3-input w3-border w3-round-large" name="email" placeholder="e-mail" type="email" required>
					<input name="fb_id" id="fb_id" type="hidden"><!-----Facebook id------->
				</p>
				
				<p>
					<label>ตั้งรหัสผ่าน Password&nbsp;&nbsp;</label><i class="fa fa-eye" aria-hidden="true"></i><!-----เช็คให้ไม่ต่ำกว่า 8 ตัว- และเปลี่ยน type ให้แสดงรหัสได้------>
					<input class="w3-input w3-border w3-round-large" name="password" type="password" required>
				</p>
				
				<p>
					<label>ใส่รหัสผ่านอีกครั้ง  Confirm Password&nbsp;&nbsp;</label><i class="fa fa-eye" aria-hidden="true"></i><!-----เช็คให้ตรงกับด้านบน---และเปลี่ยน type ให้แสดงรหัสได้----->
					<input class="w3-input w3-border w3-round-large" name="re_password" type="password" required>
				</p>
				
				<div class="w3-half w3-padding-small">
				<p>
					<label>ชื่อ Name</label><!--------->
					<input class="w3-input w3-border w3-round-large" name="name" placeholder="Name" type="text" required>
				</p>
				</div>
				
				<div class="w3-half w3-padding-small">
				<p>
					<label>นามสกุล Family Name</label><!--------->
					<input class="w3-input w3-border w3-round-large" name="f_name" placeholder="Family Name" type="text" required>
				</p>
				</div>
				
				<div class="w3-half w3-padding-small">
				<p>
					<label>เบอร์โทร Tel.</label><!--------->
					<input class="w3-input w3-border w3-round-large" name="tel" placeholder="Tel" type="text" required>
				</p>
				</div>
				
				<div class="w3-half w3-padding-small">
				<p>
					<label>เบอร์โทรสำรอง Another Tel.</label><!--------->
					<input class="w3-input w3-border w3-round-large" name="tel_2" placeholder="Tel" type="text" >
				</p>
				</div>
				
				<p>
				  <label>ที่อยู่ Address</label>
				  <textarea rows="4" class="w3-input w3-border w3-round-large" name="address" placeholder="Address" required></textarea>
				</p>

				<p>
					<label>วัตถุประสงค์ Purpose</label>
					<p>
						<input class="w3-radio" type="radio" name="agent" value="agent" checked>
						<label>ลงขายแพคเกจทัวร์ </label>
					</p>
					<p>
						<input class="w3-radio" type="radio" name="tranlator" value="tranlator">
						<label>แปลภาษาไทย &#8596; จีน</label>
					</p>
					<p>
						<input class="w3-radio" type="radio" name="qr_agent" value="qr_agent">
						<label>ตัวแทนจำหน่าย Sale Agent</label>
					</p>
				</p>
			
				<p>&nbsp;</p>
			<!--------------------เมื่อติ๊กช่อง ลงขายแพคเกจทัวร์--------------------------------->
				<div class="w3-container w3-border w3-round-large">
				<h4>เอเจนซ์ทัวร์</h4>
					<p>
						<label>ชื่อนิติบุคคล</label><!--------->
						<input class="w3-input w3-border w3-round-large" name="company_name" placeholder="ชื่อนิติบุคคล" type="text" required>
					</p>
					
					<p>
						<label>เลขประจำตัวผู้เสียภาษี</label><!--------->
						<input class="w3-input w3-border w3-round-large" name="tax_id" placeholder="เลขประจำตัวผู้เสียภาษี" type="number" required>
					</p>
					<p>
					  <label>ที่ตั้ง</label>
					  <textarea rows="3" class="w3-input w3-border w3-round-large" name="company_address" placeholder="ที่ตั้ง" required></textarea>
					</p>
					<p>
						<label>ไฟล์เอกสาร หนังสือรับรองจดทะเบียนนิติบุคคล (ไฟล์ภาพ หรือเอกสาร PDF)</label>
						<input class="w3-input w3-border w3-round-large" name="company_certificate" id="company_certificate" type="file" accept="application/pdf, image/png, image/jpeg" required>
					</p>
					<p>
						<label style="display: block;">เลขทะเบียนนำเที่ยว</label><!----เก็บในรูปแบบ 00/000 เป็น Text ----->
						<input class="w3-margin w3-input w3-border w3-round-large" style="width:30%;display: inline;" name="permission_id" placeholder="00" type="number" required>
						<font size="5">/</font>
						<input class="w3-margin w3-input w3-border w3-round-large" style="width:40%;display: inline;" name="permission_id" placeholder="00000" type="number" required>
					</p>
					<p>
						<label>ประเภทธุรกิจนำเที่ยว</label><!----แสดงอัตโนมัติ โดยที่ เลขจะเป็นแบบนี้ 00/00000 -สองตัวหน้า โดยที่ 11 = ใบอนุญาตนำเที่ยวต่างประเทศ, 12 = ใบอนุญาตนำเที่ยวในประเทศ,  13 = อนุญาตนำเที่ยวเฉพาะพื้นที่,      14 = ใบอนุญาตนำเที่ยวแบบอินบาวด์ ,    ---->
						<input class="w3-input w3-border w3-round-large" name="permission_type" type="text" disabled>
					</p>
					
				</div>
	<!------------------------------------------>
	<!-------------------เมื่อติ๊ก แปลภาษา กับตัวแทน----------------------->
			<div class="w3-container w3-border w3-round-large">
				<h4>นักแปลภาษา</h4> <!----ดูว่าติ๊กอะไรก็เลือกอันนั้นแหละ----->
				<h4>ตัวแทนจำหน่าย Sale Agent</h4>
					<p>
						<label>เลขบัตรประชาชน</label><!--------->
						<input class="w3-input w3-border w3-round-large" name="id_card_number" placeholder="เลขบัตรประชาชน" type="number" required>
					</p>
					<p>
						<label>ไฟล์เอกสาร สำเนาบัตรประชาชน (ไฟล์ภาพ หรือเอกสาร PDF)</label>
						<input class="w3-input w3-border w3-round-large" name="id_card_pic" id="id_card_pic" type="file" accept="application/pdf, image/png, image/jpeg" required>
					</p>
					
<!--ส่วนนี้เฉพาะคนที่สมัคร-แปลภาษา------------------------->			
					<div>
						<div style="margin-bottom: -0.7rem;"><label>ความถนัด</label></div>
						<div class="w3-half">
							<p>
								<input class="w3-radio" type="radio" name="skill_ch2th" value="แปลภาษาจีนไทย">
								<label>แปลภาษาจีน&#8594;ไทย </label>
							</p>
							<p>
								<input class="w3-radio" type="radio" name="skill_th2ch" value="แปลภาษาไทยจีน" checked>
								<label>แปลภาษาไทย&#8594;จีน</label>
							</p>
						</div>
						<div class="w3-half">
							<p>
								<input class="w3-radio" type="radio" name="skill_essay_ch" value="เรียงความรีวิวภาษาจีน">
								<label>เรียงความ-รีวิว ภาษาจีน</label>
							</p>
							<p>
								<input class="w3-radio" type="radio" name="skill_conver_ch" value="พูดสนทนาภาษาจีน">
								<label>พูด-สนทนา ภาษาจีน</label>
							</p>
						</div>
					</div>
<!----------------ส่วนนี้เฉพาะคนที่สมัคร-แปลภาษา และตัวแทนขาย------------------------->							
					<p>
						<label>ปัจจุบันประกอบอาชีพ</label><!--------->
						<input class="w3-input w3-border w3-round-large" name="career" placeholder="อาชีพ" type="text" required>
					</p>
					<p>
						<label>ที่อยู่ที่ทำงาน</label><!--------->
					  <textarea rows="3" class="w3-input w3-border w3-round-large" name="career_address" placeholder="ที่อยู่ที่ทำงาน" required></textarea>
					</p>

			</div>
			
			<p>&nbsp;</p>
			
			<div class="w3-container w3-border w3-round-large">
				<h4>บัญชีสำหรับรับเงิน</h4>	
					<p>
						<label>ชื่อธนาคาร</label><!--------->
						<input class="w3-input w3-border w3-round-large" name="bank_name" placeholder="ชื่อธนาคาร" type="text" required>
					</p>
					<p>
						<label>ชื่อบัญชี</label><!--------->
						<input class="w3-input w3-border w3-round-large" name="bank_acc_name" placeholder="ชื่อบัญชี" type="text" required>
					</p>
					<p>
						<label>หมายเลขบัญชี</label><!--------->
						<input class="w3-input w3-border w3-round-large" name="bank_acc_number" placeholder="หมายเลขบัญชี" type="number" required>
					</p>
					<p>
						<label>ไฟล์เอกสาร หน้าบัญชี (ไฟล์ภาพ หรือเอกสาร PDF)</label>
						<input class="w3-input w3-border w3-round-large" name="book_bank_pic" id="book_bank_pic" type="file" accept="application/pdf, image/png, image/jpeg" required>
					</p>

			</div>

		<!------------------------------------------>	



		
				<p>&nbsp;</p>
				
				<div class="w3-container w3-border w3-round-large">
				
					<div class="w3-border w3-margin" style=" height: 150px; overflow: auto;">
						<?php include '../terms_of_service.php'; ?>
					</div>
					
					<p class="w3-center">
						<input class="w3-check" type="checkbox">
						<label><b>ฉันได้ทำความเข้าใจ ข้อกำหนดและเงื่อนไขข้างต้น และยอมรับข้อตกลง และเงื่อนไขแล้ว<b></label><!--- ติ๊กแล้วสามารถกดตก------> 
					</p>
					
				</div>
			  
			  
			  <p>&nbsp;</p>
			  
			  			  			  
			   <p class="w3-center"><button class="w3-button w3-green w3-round-xlarge w3-large" type="submit">สมัคร Register</button></p>
			</form>
		</div>
		
		<div class="w3-quarter w3-container">
		  &nbsp;
		</div>
		
		
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
	
	<?php include 'footer.php'; ?>
  </body>
</html>
