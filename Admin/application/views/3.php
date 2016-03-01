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
				<form action="<?php $id = $this->uri->segment(3); echo base_url('ctb/box/'.$id."/addText") ?>" data-box="<?php echo $id ?>" method="POST" id="form">
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" id="title">
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
					<table class="table table-bordered" id="table">
						<thead>
							<tr>
								<th>Title</th>
								<th>Position</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="content">
							<?php foreach ($content as $key): ?>
							<tr>
								<td><?php echo $key->title ?></td>
								<td>
									<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-up"></i></button>
									<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-down"></i></button>
								</td>
								<td>
									<a href="<?php echo base_url('ctb/box/'.$this->uri->segment(3)) ?>" class="btn btn-outline btn-primary">Edit</a>
									<a href="<?php echo base_url('ctb/box/'.$this->uri->segment(3).'/text/delete-content/') ?>" data-id="<?php echo $key->id_content ?>" class="btn btn-outline btn-danger" delete>Delete</a>
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
<script src="<?php echo base_url('assets') ?>/js/plugins/summernote/summernote.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.summernote').summernote();
	$('#form').submit(function() {
		var url = $(this).attr('action'),
		id 		= $(this).attr('data-box'),
		content = $('#text').val(),
		title 	= $('#title').val();
		$.ajax({
		 	url: url,
		 	type: 'POST',
		 	data: {
		 		id: id,
		 		title: title,
		 		content: content,
		 		type: '3'
		 	},
		 	success: function(resp){
		 		alert(resp.msg);
		 		$('#content').html(resp.data);
		 	}
		 })
		return false;
	});
	$('#table').on('click', 'a[delete]', function() {
		var url = $(this).attr('href'),
		id = $(this).attr('data-id'),
		me = $(this);
		$.ajax({
			url: url,
			type: 'POST',
			data: {id: id},
			success: function(resp){
				alert(resp)
				if (resp == "Content Berhasil di Hapus") {
					me.closest('tr').remove();
				}
			}
		})
		return false;
		/* Act on the event */
	});
});
</script>