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
								<th class="hide"></th>
								<th>Position</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="content">
							<?php foreach ($content as $key): ?>
							<tr class="text-cont" data-id="<?php echo $key->id_content ?>">
								<td class="title"><?php echo $key->title ?></td>
								<td class="hide content"><?php echo $key->content ?></td>
								<td>
									<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-up"></i></button>
									<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-down"></i></button>
								</td>
								<td>
									<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button>
									<a href="<?php echo base_url('ctb/box/'.$this->uri->segment(3).'/text/delete-content/') ?>" data-id="<?php echo $key->id_content ?>" class="btn btn-outline btn-danger" delete>Delete</a>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
	                <div class="modal-dialog">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                            <h4 class="modal-title">Modal title</h4>
	                            <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
	                        </div>
                        	<form action="<?php echo base_url('ctb/box/'.$this->uri->segment(3).'/edit-text') ?>" id="edit">
                        	<div class="table-responsive">
		                        <div class="modal-body">
			                        	<div class="form-group">
			                        		<label>Title</label>
			                        		<input type="text" value="" placeholder="Masukan Title" id="editTitle" class="form-control">
			                        	</div>
		                        	<div class="scroll-content">
			                            <textarea name="" class="summernote" id="editContent"></textarea>
		                        	</div>
		                        </div>
		                        <div class="modal-footer">
		                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
		                            <button type="submit" class="btn btn-primary" data-id="" id="submit">Save changes</button>
		                        </div>
                        	</div>
                        	</form>
	                    </div>
	                </div>
	            </div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url('assets') ?>/js/plugins/summernote/summernote.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/toastr/toastr.min.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.summernote').summernote();
	$('.scroll-content').slimScroll();
	count()
	function count(){
		var count = $('.text-cont').length;
		if (count == 0) {
			$('tbody').append('<tr class="null"><td colspan="3" align="center"><b>Tidak ada Text yang tersedia</b></td></tr>')
		} else {
			$('.null').remove();
		}
	}
	function alert(status, msg){
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "progressBar": true,
		  "positionClass": "toast-top-right",
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "7000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
		if (status) {
			toastr.success(msg, 'Success');
		}else{
			toastr.error(msg, 'Error');
		}
	}
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
		 		// console.log(resp)
		 		alert(resp.success, resp.msg);
		 		$('#content').append(resp.data);
		 		count()
				$('.note-editable').html("<p><br></p>")
		 		$('#text').val('');
		 		$('#title').val('');
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
				if (resp.success) {
					me.closest('tr').remove();
					count();
				}
				alert(resp.success, resp.msg)
			}
		})
		return false;
	})
	$('#table').on('click', 'button[edit]', function() {
		var title = $(this).closest('tr').children('td.title').text(),
		content = $(this).closest('tr').children('td.content').html(),
		id = $(this).closest('tr').attr('data-id');
		$('#submit').attr('data-id', id);
		$('#editTitle').val(title);
		$('#editContent').text(content);
		$('#editContent').closest('div.scroll-content').children('div.note-editor').children('div.note-editable').html(content);
		console.log(content)
	});
	$('#edit').submit(function() {
		var url = $(this).attr('action'), 
		id = $('#submit').attr('data-id'),
		title = $('#editTitle').val(),
		content = $('#editContent').val();
		$.ajax({
			url: url,
			type: 'POST',
			data: {
				id: id,
				title: title,
				content: content
			},
			success:function(resp){
				if (resp.success) {
					$('tr[data-id="'+resp.id+'"]').html(resp.updated);
				}
				count();
				alert(resp.success, resp.msg)
			}
		})
		return false;
	});
});
</script>