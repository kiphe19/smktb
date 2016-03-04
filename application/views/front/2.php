<div class="carousel carousel-img" id="carousel-img">
	<?php foreach ($content as $key): ?>
	<div class="slide">
		<img src="<?php echo base_url('./uploads/'.$key->content) ?>">
	</div>	
	<?php endforeach ?>
</div>