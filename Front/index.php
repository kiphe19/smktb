<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="./assets/css/metro-icons.css">
		<link rel="stylesheet" type="text/css" href="./assets/css/metro.css">
		<link rel="stylesheet" type="text/css" href="./assets/css/metro-responsive.css">
		<script type="text/javascript" src="./assets/js/jquery-2.1.3.min.js"></script>
	</head>
	<body>
		<div class="flex-grid">
			<div class="row" style="height: 47.5vh">
				<div class="cell colspan6 bg-blue">
					<video autobuffer autoloop loop autoplay class="no-margin" width="100%" height="315px">
						<source src="../media/video/asds.mp4">
						<source src="../media/video/asd.m4v">
					</video>
				</div>
				<div class="cell colspan6 bg-lighterBlue">
					Box 2
				</div>
			</div>
			<div class="row" style="height: 47.5vh">
				<div class="cell colspan6 bg-green">
					Box 3
				</div>
				<div class="cell colspan6 bg-lightGreen">
					Box 4
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
</script>
</html>