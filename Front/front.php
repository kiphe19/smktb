<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
		<script type="text/javascript" src="./assets/js/jquery-2.1.3.min.js"></script>
	</head>
	<body>
		<style type="text/css" media="screen">
			.col-md-6{
				padding-right: 0;
				padding-left: 0;
			}
			video{
				width: 100%;
				height: 100%;
				/*max-height: 46vh;*/
				object-fit: cover; 
				display: inherit;
			}
			img{
				width: 100%;
				height: auto;
				max-height: 46vh;
				object-fit: fill;
			}
			.slide{
				width: 100%;
				height: 100%;
				position: relative;
				text-align: left;
			}
		</style>
		<div class="row">
			<div class="col-md-6" style="">
				<video autobuffer autoloop loop autoplay>
					<source src="../media/video/asds.mp4" type="mp4/webm"">
					<source src="../media/video/asd.m4v" type="mp4/webm"">
				</video>
			</div>
			<div class="col-md-6">2</div>
		</div>
		<div class="row">
			<div class="col-md-6" style="">
				<div id="slideshow" class="slideshow">
					<div class="slide">
				    	<img src="../media/image/1.jpg">
					</div>   
					<div class="slide">
				    	<img src="../media/image/2.jpg">
					</div>
					<div class="slide">
				     	<img src="../media/image/3.jpg">
					</div>
				</div>
			</div>
			<div class="col-md-6">4</div>
		</div>
		<div class="row" style="background-color: blue;">
			<div class="col-md-2">
				<span id="clock"></span>
			</div>
			<div class="col-md-10">
				<marquee>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</marquee>
			</div>
		</div>

		<script type="text/javascript">
		$(document).ready(function() {
			function time(){
				var now = new Date(),
				curr_hour = now.getHours(), 
				curr_min = now.getMinutes(), 
				curr_sec = now.getSeconds();
				curr_hour = conv(curr_hour);
				curr_min = conv(curr_min);
				curr_sec = conv(curr_sec);
				$("#clock").text(curr_hour+":"+curr_min+":"+curr_sec);
			}
			var conv = function(i){
				if (i < 10) {
					i = "0" + i;
				}
				return i;
			}
			setInterval(time, 500);
		});
			//Slideshow
			$("#slideshow > div:gt(0)").hide();
			setInterval(function() { $('#slideshow > div:first') .fadeOut(1000) .next() .fadeIn(1000) .end() .appendTo('#slideshow'); }, 5000);
		</script>
	</body>
</html>