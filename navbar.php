<!-- Navbar -->
 <!-- Navbar on small screens -->
  
  <div class="w3-bar w3-red w3-card w3-left-align w3-large" >
    <a class="w3-bar-item w3-button w3-padding-24  w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
	<a class="w3-bar-item w3-hide-small w3-hide-medium w3-padding-24" style="width: 5%;" >&nbsp;</a>
	<a href="" class="w3-bar-item  w3-red"style="width: 20%;"><img src="images/logo_cn.png" height="55"></a>
	<a class="w3-bar-item w3-hide-small w3-hide-medium w3-padding-24 w3-right" style="width: 4%;" >&nbsp;</a>
	<a href="" class="w3-bar-item w3-button w3-right w3-hide-small w3-hide-medium  w3-hover-white w3-border w3-border-white w3-round-large w3-margin">登录/注册</a>
	<a href="" class="w3-bar-item w3-button w3-right w3-hide-small w3-hide-medium  w3-hover-white w3-padding-16"><i class="fa fa-wechat fa-2x"></i></a>
	<a href="" class="w3-bar-item w3-button w3-right w3-hide-small w3-hide-medium  w3-hover-white w3-padding-16"><i class="fa fa-weibo fa-2x"></i></a>
	<a href="" class="w3-bar-item w3-button w3-right w3-hide-small w3-hide-medium w3-padding-24 w3-hover-white">联系我们</a>
    <a href="" class="w3-bar-item w3-button w3-right w3-hide-small  w3-hide-medium w3-padding-24 w3-hover-white">咨询</a>
    <a href="" class="w3-bar-item w3-button w3-right w3-hide-small  w3-hide-medium w3-padding-24 w3-hover-white">文章</a>
    <a href="" class="w3-bar-item w3-button w3-right w3-hide-small  w3-hide-medium w3-padding-24 w3-hover-white">旅游套餐</a>
    <a href="" class="w3-bar-item w3-button w3-right w3-hide-small  w3-hide-medium w3-padding-24 w3-hover-white">首页</a>
  </div>
  <div id="navDemo" class="w3-bar-block w3-red w3-hide w3-hide-large  w3-large" >
	<a class="w3-bar-item w3-button w3-padding-large">&nbsp;</a>   
	<a href="" class="w3-bar-item w3-button w3-padding-large">首页</a>
	<a href="" class="w3-bar-item w3-button w3-padding-large">旅游套餐</a>
    <a href="" class="w3-bar-item w3-button w3-padding-large">文章</a>
    <a href="" class="w3-bar-item w3-button w3-padding-large">咨询</a>
    <a href="" class="w3-bar-item w3-button w3-padding-large">联系我们</a>
  </div>
 
</div>
<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace("w3-show", "");
    }
}
</script>