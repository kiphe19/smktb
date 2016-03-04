<video autobuffer autoloop loop autoplay>
	<?php foreach ($content as $key): ?>
	<source src="<?php echo base_url('./uploads/'.$key->content) ?>">
	<?php endforeach ?>
	<!-- <source src="../media/video/asd.m4v"> -->
</video>