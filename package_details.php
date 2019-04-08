
<title>沂天旅游</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="images/favicon.png">
<link rel="stylesheet" href="css/w3style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC" rel="stylesheet">

<link rel="stylesheet" href="css/my-slider.css"/>
<script src="js/ism-2.2.min.js"></script>

<link rel="stylesheet" href="css/calendar.css"/>

<link href="css/timeline.css" rel="stylesheet" id="bootstrap-css">
<script>
$(document).ready(function(){
	var my_posts = $("[rel=tooltip]");

	var size = $(window).width();
	for(i=0;i<my_posts.length;i++){
		the_post = $(my_posts[i]);

		if(the_post.hasClass('invert') && size >=767 ){
			the_post.tooltip({ placement: 'left'});
			the_post.css("cursor","pointer");
		}else{
			the_post.tooltip({ placement: 'rigth'});
			the_post.css("cursor","pointer");
		}
	}
});
</script>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: 'Noto Sans SC', sans-serif;}
.w3-bar,h1,button {font-family: 'Noto Sans SC', sans-serif;}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>
<?php include 'navbar.php'; ?>


<!-- first Grid -->
<div class="w3-container w3-white">
		<div class="w3-quarter-body w3-container">
			&nbsp;
		</div>
		<div class="w3-half-body w3-container">
			<div class="w3-display-container">
				<img src="/images/04.jpg" alt="New York" style="object-fit:cover;width: 100%;height: 40%;">
				<span class="w3-display-bottomleft w3-white w3-block w3-opacity-min" style="height: 50%;"></span>
				<span class="w3-display-bottomleft w3-margin-left w3-block" style="height: 50%;">
					<h3><b>詹姆斯邦德 - 纳卡岛快艇游览</b></h3>
					<div class="w3-container">
						<i class="fa fa-star checked"></i>
						<i class="fa fa-star checked"></i>
						<i class="fa fa-star checked"></i>
						<i class="fa fa-star-o checked"></i>
						<i class="fa fa-star-o checked"></i>
						/ 5 评价 
						&emsp;&emsp;<h2 style="display:inline">|</h2> &emsp;&emsp;
						<h4 style="display:inline">一日游</h4>
						&emsp;&emsp;<h2 style="display:inline">|</h2> &emsp;&emsp;
						<h3 style="display:inline">2,000</h3>
						<?php echo date('D',mktime(0, 0, 0, 4, 2)); ?>
					</div> 
				</span>
			</div>
		</div>
		<div class="w3-quarter-body w3-container">
			&nbsp;
		</div>
	
</div>
<!-- second Grid -->

<div class="w3-container w3-white">

		<div class="w3-quarter-body w3-container">
			&nbsp;
		</div>
		<div class="w3-half-body w3-container">
			<?php include 'module_calendar.php'; ?>
		</div>
		<div class="w3-quarter-body w3-container">
			&nbsp;
		</div>
	
</div>

<div class="w3-container w3-white">
		<div class="w3-quarter-body w3-container">
			&nbsp;
		</div>
		<div class="w3-half-body w3-container">
			
			
		<ul class="timeline">
		
        <li>
          <div class="timeline-badge primary"><a><i class="glyphicon glyphicon-record" rel="tooltip" title="11 hours ago via Twitter" id=""></i></a></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <img style="max-width: 100%;" src="http://lorempixel.com/1600/500/sports/2" />
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
            </div>
            <div class="timeline-footer">
                <a><i class="glyphicon glyphicon-thumbs-up"></i></a>
                <a><i class="glyphicon glyphicon-share"></i></a>
                <a class="pull-right">Continuar Lendo</a>
            </div>
          </div>
        </li>

        
        
        <li  class="timeline-inverted">
          <div class="timeline-badge primary"><a><i class="glyphicon glyphicon-record invert" rel="tooltip" title="11 hours ago via Twitter" id=""></i></a></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <img style="max-width: 100%;" src="http://lorempixel.com/1600/500/sports/2" />
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
            </div>
            <div class="timeline-footer primary">
                <a><i class="glyphicon glyphicon-thumbs-up"></i></a>
                <a><i class="glyphicon glyphicon-share"></i></a>
                <a class="pull-right">Continuar Lendo</a>
            </div>
          </div>
        </li>
		
        <li>
          <div class="timeline-badge primary"><a><i class="glyphicon glyphicon-record invert" rel="tooltip" title="11 hours ago via Twitter" id=""></i></a></div>
          <div class="timeline-panel">
            <div class="timeline-body">
              <p><b>All the credits go to <a href="http://bootsnipp.com/rafamaciel">Rafamaciel</a></b></p>
              <p>I only make it responsive and remove the empty spaces to be more like Facebook timeline!</p>
            </div>
            <div class="timeline-footer primary">
                <a><i class="glyphicon glyphicon-thumbs-up"></i></a>
                <a><i class="glyphicon glyphicon-share"></i></a>
                <a class="pull-right">Continuar Lendo</a>
            </div>
          </div>
        </li>
        
		
        <li class="clearfix" style="float: none;"></li>
    </ul>	
			
			
		
		</div>
		<div class="w3-quarter-body w3-container">
			&nbsp;
		</div>
	
</div>













</div>
<!-- end Grid -->
<div class="w3-container w3-white w3-center w3-padding-16">
    &nbsp; 
</div>

<?php include 'footer.php'; ?>



</body>
</html>
