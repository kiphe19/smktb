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
				<form id="frmVideo">
					<div class="form-group">
						<label>Video</label>
						<input type="file" name="" value="" id="files">
					</div>
					<button type="submit" class="btn btn-flat btn-info"><i class="fa fa-send"></i> Publish</button>
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

<script type="text/javascript">
	$("form").submit(function(e){
		e.preventDefault();

		var form = new FormData(document.getElementById('frmVideo'));
		var file = document.getElementById('files').files[0];
		if (file) {
			form.append('files', file);
		}
		$.ajax({
			url: "../chapters/create",
			type: 'POST',
			data: form,             
			cache: false,
        	contentType: false, //must, tell jQuery not to process the data
        	processData: false, //must, tell jQuery not to set contentType
        	success: function(data) {
	        	console.log(data);
    	    },
        	complete: function(XMLHttpRequest) {
        		var data = XMLHttpRequest.responseText;
        		console.log(data);
        	},
        	error: function() {
        		alert("ERROR");
        	}
    		}).done(function() { 
    			console.log('Done');
		    }).fail(function() {       
    			alert("fail!");
    		});
	})
</script>