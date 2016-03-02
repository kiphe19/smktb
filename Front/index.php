<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="./assets/css/metro-icons.css">
		<link rel="stylesheet" type="text/css" href="./assets/css/metro.css">
		<link rel="stylesheet" type="text/css" href="./assets/css/metro-responsive.css">
		<script type="text/javascript" src="./assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="./assets/js/metro.js"></script>

		<style type="text/css" media="screen">
			video{
				min-width: 100%;
				max-width: 100%;
				min-height: 100%
				max-height: 100%;
				object-fit: fill; 
			}
			img{
				min-width: 100%;
				min-height: 100%;
				max-height: 100%;
				object-fit: fill; 	
			}
		</style>
	</head>
	<body>
		<div class="flex-grid">
			<div class="row" style="height: 47.5vh">
				<div class="cell colspan6 bg-blue">
					<video autobuffer autoloop loop autoplay>
						<source src="../media/video/Video.mp4">
						<source src="../media/video/Video2.mkv">
					</video>
				</div>
				<div class="cell colspan6 bg-lighterBlue" style="border-bottom: 1px solid black;border-left: 1px solid red">
					Box 2
				</div>
			</div>
			<div class="row" style="height: 47.5vh">
				<div class="cell colspan6 bg-green" style="border-right: 1px solid black;border-top: 1px solid red">
					<div class="carousel" id="carousel-img">
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
				<div class="cell colspan6 bg-lightGreen">
					<div class="carousel" id="carousel-text">
						<div class="slide">
							<?php echo "Text 1"; ?>
						</div>   
						<div class="slide">
							<?php echo "Text 2"; ?>
						</div>
						<div class="slide">
							<?php echo "Text 3"; ?>
						</div>
                    </div>
				</div>
			</div>
			<div class="row" style="height: 5vh">
				<div class="cell colspan12 fg-white">
					<div class="row" style="height: 5vh">
						<div class="cell colspan2 bg-darkTeal" style="padding: 10px 90px 10px 90px;">
							<span id="clock"></span>
						</div>
						<div class="cell colspan10 bg-teal text-shadow" style="padding: 10px 0 10px 0">
							<marquee>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</marquee>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
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

	// Carousel
	$(function(){
        $('#carousel-img').carousel({
		    auto: true,
		    effect: 'slowdown',
		    direction: 'left',
		    controls: false,
		    top: false,
		    period: 5000,
		    duration: 1000,
		    markers: {
		    	show: false,
		    	type: 'square',
		    	position: 'bottom-right'
		    }
		});
        $('#carousel-text').carousel({
		    auto: true,
		    direction: 'right',
		    controls: false,
		    top: false,
		    period: 5000,
		    duration: 1000,
		    markers: {
		    	show: false,
		    	type: 'square',
		    	position: 'bottom-right'
		    }
		});
    })(jQuery);

</script>
</html>