<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2><?php echo $title ?></h2>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url() ?>">Home</a>
			</li>
			<li>
				Tergantung Box
			</li>
			<li class="active">
				<strong><a><?php echo $title ?></a></strong>
			</li>
		</ol>
	</div>
	<div class="col-lg-2">
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Edit <?php echo $title ?></h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<form>
						<div class="form-group">
							<label>Video</label>
							<input type="file" name="" value="">
						</div>
						<button type="submit" class="btn btn-flat btn-info"><i class="fa fa-send"></i> Publish</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>List <?php echo $title ?></h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<p class="m-b-lg">
						Each list you can customize by standard css styles. Each element is responsive so you can add to it any other element to improve functionality of list.
					</p>
					<div class="dd" id="nestable2">
						<ol class="dd-list">
							<li class="dd-item" data-id="1">
								<div class="dd-handle">
									<span class="label label-info"><i class="fa fa-users"></i></span> Cras ornare tristique.
								</div>
								<ol class="dd-list">
									<li class="dd-item" data-id="2">
										<div class="dd-handle">
											<span class="pull-right"> 12:00 pm </span>
											<span class="label label-info"><i class="fa fa-cog"></i></span> Vivamus vestibulum nulla nec ante.
										</div>
									</li>
									<li class="dd-item" data-id="3">
										<div class="dd-handle">
											<span class="pull-right"> 11:00 pm </span>
											<span class="label label-info"><i class="fa fa-bolt"></i></span> Nunc dignissim risus id metus.
										</div>
									</li>
									<li class="dd-item" data-id="4">
										<div class="dd-handle">
											<span class="pull-right"> 11:00 pm </span>
											<span class="label label-info"><i class="fa fa-laptop"></i></span> Vestibulum commodo
										</div>
									</li>
								</ol>
							</li>
							<li class="dd-item" data-id="5">
								<div class="dd-handle">
									<span class="label label-warning"><i class="fa fa-users"></i></span> Integer vitae libero.
								</div>
								<ol class="dd-list">
									<li class="dd-item" data-id="6">
										<div class="dd-handle">
											<span class="pull-right"> 15:00 pm </span>
											<span class="label label-warning"><i class="fa fa-users"></i></span> Nam convallis pellentesque nisl.
										</div>
									</li>
									<li class="dd-item" data-id="7">
										<div class="dd-handle">
											<span class="pull-right"> 16:00 pm </span>
											<span class="label label-warning"><i class="fa fa-bomb"></i></span> Vivamus molestie gravida turpis
										</div>
									</li>
									<li class="dd-item" data-id="8">
										<div class="dd-handle">
											<span class="pull-right"> 21:00 pm </span>
											<span class="label label-warning"><i class="fa fa-child"></i></span> Ut aliquam sollicitudin leo.
										</div>
									</li>
								</ol>
							</li>
						</ol>
					</div>
					<div class="m-t-md">
						<h5>Serialised Output</h5>
					</div>
					<textarea id="nestable2-output" class="form-control"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#nestable-menu').on('click', function (e) {
                 var target = $(e.target),
                         action = target.data('action');
                 if (action === 'expand-all') {
                     $('.dd').nestable('expandAll');
                 }
                 if (action === 'collapse-all') {
                     $('.dd').nestable('collapseAll');
                 }
             });
});
</script>