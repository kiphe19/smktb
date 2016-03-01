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
					<div class="dz-default dz-message"><span>Drop files here to upload</span></div>
				</form>
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
					<table class="table table-bordered" id="table">
						<thead>
							<tr>
								<th>Video</th>
								<th>Position</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($content as $key): ?>
							<?php $par = (strlen($key->content) > 20) ? "..." : ""; ?>
							<tr class="vid-cont">
								<td><a href="" title="<?php echo $key->content ?>"><?php echo substr($key->content, 0, 20) . $par; ?></a></td>
								<td>
									<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-up" onclick="up(<?php echo $key->position;?>);"></i></button>
									<button type="button" class="btn btn-flat btn-outline btn-success" onclick="down(<?php echo $key->position;?>)"><i class="fa fa-arrow-down"></i></button>
								</td>
								<td>
									<a href="#" class="btn btn-flat btn-outline btn-primary"><i class="fa fa-eye"></i></a>
									<a href="<?php echo base_url('ctb/box/'.$this->uri->segment(3).'/video/delete-content') ?>" class="btn btn-outline btn-danger" data-id="<?php echo $key->id_content ?>" data-name="<?php echo $key->content ?>" delete><i class="fa fa-trash"></i> Delete</a>
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
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/toastr/toastr.min.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	count();
	function count(){
		var count = $('.vid-cont').length;
		if (count == 0) {
			$('tbody').append('<tr><td colspan="3" align="center"><b>Tidak ada Video yang tersedia</b></td></tr>')
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
	Dropzone.options.myAwesomeDropzone = {
		url: '<?php echo base_url('ctb/box/'.$this->uri->segment(3).'/video/upload'); ?>',
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
			this.on('success', function(a, resp){
				var a = JSON.parse(resp);
				$('tbody').append(a.data)
				alert(a.success, a.msg);
			})
		}
	}
	$('#table').on('click', 'a[delete]', function() {
		var url = $(this).attr('href'),
		id_content = $(this).attr('data-id'),
		name = $(this).attr('data-name'),
		me = $(this);
		$.ajax({
			url: url,
			type: 'POST',
			data: {
				id_content: id_content,
				name: name
			},
			success: function(resp){
				if (resp.success == true) {
					me.closest('tr').remove();
					count()
				}
				alert(resp.success, resp.msg)
			}
		})
		return false;
	});
});
	
</script>