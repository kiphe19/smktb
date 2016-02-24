<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Form <?php echo $title ?></h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<form>
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Content</label>
						<textarea class="summernote" id="text"></textarea>
					</div>
					<button type="submit" class="btn btn-flat btn-info" id="publish"><i class="fa fa-send"></i> Publish</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>List Item <?php echo $title ?></h5>
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
								<th>Title</th>
								<th>Position</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Pada Suatu Hari</td>
								<td>
									<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-up"></i></button>
									<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-down"></i></button>
								</td>
								<td>
									<a href="<?php echo base_url('ctb/box1') ?>" class="btn btn-outline btn-primary">Edit</a>
									<a href="<?php echo base_url('ctb/box1') ?>" class="btn btn-outline btn-danger">Delete</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('.summernote').summernote();
	$('#publish').click(function() {
		alert($('#text').text());
	});
});
</script>