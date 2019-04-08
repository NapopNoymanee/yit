
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

		<div class="w3-quarter-body w3-container">
		  &nbsp;
		</div>
		
		<div class="w3-half-body w3-container ">
			<form class="w3-container w3-card-4 w3-white">
			  <h2>Rounded Input</h2>
			  <p>Use any of the w3-round classes to create rounded borders.</p>

			  <p>
			  <label>First Name</label>
			  <input class="w3-input w3-border w3-round" placeholder="xxxxx" name="first" type="text"></p>
			  <p>
			  <label>Last Name</label>
			  <input class="w3-input w3-border w3-round-large" name="last" type="text"></p>
			  <p>
			  <label>Last Name</label>
			  <input class="w3-input w3-border w3-round-xxlarge" name="last" type="text"></p>
			</form>
		</div>
		
		<div class="w3-quarter-body w3-container">
		  &nbsp;
		</div>
    
	
	<?php include 'footer.php'; ?>
  </body>
</html>
