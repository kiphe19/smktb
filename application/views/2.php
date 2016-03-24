<div class="row">
	<div class="col-lg-6">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Form Upload Image</h5>
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
								<th>Image</th>
								<th>Position</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $pos = 1; foreach ($content as $key): ?>
							<?php $par = (strlen($key->content) > 20) ? "..." : ""; ?>
							<tr class="pict-cont">
								<td><a href="" title="<?php echo $key->content ?>"><?php echo substr($key->content, 0, 20) . $par ?></a></td>
								<td>
									<?php if ($pos > 1): ?>
									<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="<?php echo $key->id_content ?>" data-pos="<?php echo $key->position ?>" position-type="up" box-type="<?php echo $key->type ?>" box-id="<?php echo $key->id_box ?>"><i class="fa fa-arrow-up"></i></button>
									<?php endif ?>
									<?php if ($pos < $sum_data): ?>
									<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="<?php echo $key->id_content ?>" data-pos="<?php echo $key->position ?>" position-type="down" box-type="<?php echo $key->type ?>" box-id="<?php echo $key->id_box ?>"><i class="fa fa-arrow-down"></i></button>
									<?php endif ?>
								</td>
								<td>
									<!-- <a href="#" class="btn btn-flat btn-outline btn-primary"><i class="fa fa-eye"></i></a> -->
									<a href="<?php echo base_url('ctb/box/'.$this->uri->segment(3).'/picture/delete-content') ?>" class="btn btn-outline btn-danger" data-id="<?php echo $key->id_content ?>" data-name="<?php echo $key->content ?>" delete><i class="fa fa-trash"></i> Delete</a>
								</td>
							</tr>
							<?php $pos++; endforeach ?>
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
		count()
		function count(){
			var count = $('.pict-cont').length;
			if (count == 0) {
				$('tbody').append('<tr class="null"><td colspan="3" align="center"><b>Tidak ada Gambar yang tersedia</b></td></tr>')
			} else{
				$('tr.null').remove();
			}
		}
		function toast(status, msg){
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
			url: '<?php echo base_url('ctb/box/'.$this->uri->segment(3).'/picture/upload'); ?>',
			paramName: 'files',
			maxFilesize: 1000,
			parallelUploads: 5,
			autoProcessQueue: false,
			acceptedFiles: 'image/*',
			
			init: function(){
				var a = this;
				this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
					e.preventDefault();
					e.stopPropagation();
					a.processQueue();
				});
				this.on('success', function(a, resp){
					var a = JSON.parse(resp);
					$('tbody').html(a.data)
					toast(a.success, a.msg)	
					count()				
				});
			}
		};
		$('#table').on('click', 'a[delete]', function() {
			var url = $(this).attr('href'),
			id = $(this).attr('data-id'),
			name = $(this).attr('data-name'),
			me = $(this);
			$.ajax({
				url: url,
				type: 'POST',
				data: {
					id_content: id,
					name: name
				},
				success: function(resp){
					if (resp.success == true) {
						// me.closest('tr').remove();
						$('tbody').html(resp.data);
						count();
						toast(resp.success, resp.msg)
					}
				}
			})
			return false;
		});
		$('#table').on('click', 'button.pos', function(){
			var attr = $(this).attr('data-pos'),
				id = $(this).attr('data-id'),
				type = $(this).attr('position-type'),
				box_id = $(this).attr('box-id'),
				box_type = $(this).attr('box-type');

				if (type === 'up') {
					var data = {id: id, type: 'up', pos: attr, boxId: box_id, boxType: box_type};
				}else{
					var data = {id: id, type: 'down', pos: attr, boxId: box_id, boxType: box_type};
				}
				$.ajax({
					url: '<?php echo base_url('Ctb/chpos'); ?>',
					data: data,
					type: 'post',
					success: function(resp){
						$('tbody').html(resp.data);
						toast(resp.success, resp.msg);
					}
				})
		})
	});
</script>