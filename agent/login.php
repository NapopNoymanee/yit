<?php

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
		<script>
            var bFbStatus = false;
            var fbID = "";
            var fbName = "";
            var fbEmail = "";
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '1582778928521104',
                    cookie     : true,
                    xfbml      : true,
                    version    : 'v3.2'
                });
                FB.AppEvents.logPageView();   
            };
            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) { return; }
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            function statusChangeCallback(response){
                    if(bFbStatus == false){
                        fbID = response.authResponse.userID;
                        if (response.status == 'connected') {
                            getCurrentUserInfo(response)
                        } else {
                            FB.login(function(response) {
                                if (response.authResponse){
                                    getCurrentUserInfo(response)
                                } else {
                                    console.log('Auth cancelled.')
                                }
                            }, { scope: 'email' });
                        }
                    }
                    bFbStatus = true;
            }
            function getCurrentUserInfo() {
                FB.api('/me?fields=name,email,gender,hometown,link,location', function(userInfo) {
                    fbName = userInfo.name;
                    fbEmail = userInfo.email;
					fbGender = userInfo.gender;
					fbHometown = userInfo.hometown;
					fbLink = userInfo.link;
					fbLocation = userInfo.location;
					
					
                    console.log(fbID);
                    console.log(fbName);
                    console.log(fbEmail);
					console.log(fbGender);
                    console.log(fbHometown);
                    console.log(fbLink);
					console.log(fbLocation);
                });
            }
            function checkLoginState() {
                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
            }
        </script>
		
		<div class="w3-white w3-container w3-padding-32">&nbsp;</div>
		
		<div class="w3-third w3-container">
		  &nbsp;
		</div>
		
		<div class="w3-third w3-container w3-border w3-border-red w3-panel w3-round-xlarge">
			  <h2 class="w3-center">ยินดีต้อนรับเข้าสู่ Yi Tian Tour</h2>
			<form class="" method="post" action="" >
					<p>
					
						<div class="w3-row w3-section w3-text-red">
						  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
							<div class="w3-rest">
							  <input class="w3-input w3-border w3-round-large" name="email" type="text" placeholder="E-mail" required>
							</div>
						</div>
					</p>
					<p>
						<div class="w3-row w3-section w3-text-red">
						  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-key"></i></div>
							<div class="w3-rest">
							  <input class="w3-input w3-border w3-round-large" name="password" type="text" placeholder="รหัสผ่าน" required>
							</div>
						</div>
					</p>
						<div class="w3-bar w3-center w3-padding-small">
							<button class="w3-button w3-red w3-hover-green w3-round " style="width:235px" type="submit">เข้าสู่ระบบ</button>&nbsp;
						</div>
			</form>			
						<div class="w3-center w3-padding-32">
							<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" scope="public_profile,email" onlogin="checkLoginState();" auto-logout-link="true"></div>
						</div> 
						<div class="w3-center w3-padding">
							&nbsp;
						</div> 
						<div class="w3-bar w3-center">
							<button class="w3-button w3-green w3-hover-white w3-round-xlarge w3-small w3-padding-small w3-left" style="width:25%">สมัครสมาชิก</button>&nbsp;
							<button class="w3-button w3-teal w3-hover-white w3-round-xlarge w3-small w3-padding-small w3-right" style="width:25%">ลืมรหัสผ่าน</button>
						</div>
			
		</div>
		<div class="w3-third w3-container">
		  &nbsp;
		</div>
	</body>
</html>
