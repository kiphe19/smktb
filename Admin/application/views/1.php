<div class="row">
	<div class="col-lg-6">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Form Upload Video</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<form id="my-awesome-dropzone" class="dropzone dz-clickable" action="#">
					<div class="dropzone-previews"></div>
					<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-upload"></i> Upload</button>
					<div class="dz-default dz-message"><span>Drop files here to upload</span></div></form>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
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
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Video</th>
									<th>Position</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($content as $key): ?>
									<tr>
										<td><a href=""><?php echo $key->content ?></a></td>
										<td>
											<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-up"></i></button>
											<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-down"></i></button>
										</td>
										<td>
											<a href="#" class="btn btn-flat btn-outline btn-primary"><i class="fa fa-eye"></i></a>
											<a href="#" class="btn btn-outline btn-danger"><i class="fa fa-trash"></i> Delete</a>
										</td>
									</tr>

								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url('assets/js/dropzone.js') ?>"></script>
	<script type="text/javascript">
		Dropzone.options.myAwesomeDropzone = {
			url: '<?php echo base_url('ctb/upload'); ?>',
			paramName: 'files',
			maxFilesize: 1000,
			parallelUploads: 5,
			autoProcessQueue: false,
			acceptedFiles: 'video/*',

			init: function(){
				var a = this;
				this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
					e.preventDefault();
					e.stopPropagation();
					a.processQueue();
				});
			}
		};
	</script>