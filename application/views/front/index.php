<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/metro-icons.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/metro.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/metro-responsive.css">
		<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/metro.js"></script>

		<style type="text/css" media="screen">
			video{
				min-width: 100%;
				height: auto;
				max-height: 47.5vh;
				object-fit: fill; 
			}
			img{
				min-width: 100%;
				height: auto;
				max-height: 47.5vh;
				object-fit: fill; 	
			}
		</style>
	</head>
	<body>
		<div class="flex-grid">
			<div class="row" style="height: 47.5vh">
				<div class="cell colspan6" style="padding: <?php echo ($box1['type'] == 3) ? "15px" : "0" ; ?>">
					<?php
						$data['content'] = $box1['content']; 
						$this->load->view('front/'.$box1['type'], $data); 
					?>
				</div>
				<div class="cell colspan6" style="padding: <?php echo ($box2['type'] == 3) ? "15px" : "0" ; ?>">
					<?php
						$data['content'] = $box2['content']; 
						$this->load->view('front/'.$box2['type'], $data); 
					?>
				</div>
			</div>
			<div class="row" style="height: 47.5vh">
				<div class="cell colspan6" style="padding: <?php echo ($box3['type'] == 3) ? "15px" : "0" ; ?>">
					<?php
						$data['content'] = $box3['content']; 
						$this->load->view('front/'.$box3['type'], $data); 
					?>
				</div>
				<div class="cell colspan6" style="padding: <?php echo ($box4['type'] == 3) ? "15px" : "0" ; ?>">
					<?php
						$data['content'] = $box4['content']; 
						$this->load->view('front/'.$box4['type'], $data); 
					?>
				</div>
			</div>
			<div class="row" style="height: 5vh">
				<div class="cell colspan12 fg-white">
					<div class="row" style="height: 5vh">
						<div class="cell colspan2 bg-darkTeal" style="padding: 10px 90px 10px 90px;">
							<span id="clock"></span>
						</div>
						<div class="cell colspan10 bg-teal text-shadow" style="padding: 10px 0 10px 0">
							<marquee><?php echo htmlentities($news['content']) ?></marquee>
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
        $('.carousel-img').carousel({
		    auto: true,
		    direction: 'left',
		    controls: false,
		    stop: false,
		    period: 5000,
		    duration: 1000,
		    markers: {
		    	show: false,
		    	type: 'square',
		    	position: 'bottom-right'
		    }
		});
        $('.carousel-text').carousel({
		    auto: true,
		    direction: 'right',
		    controls: false,
		    period: 5000,
		    stop: false,
		    duration: 1000,
		    markers: {
		    	show: false,
		    	type: 'box',
		    	position: 'bottom-right'
		    }
		});
    })(jQuery);

</script>
</html>