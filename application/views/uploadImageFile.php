<!DOCTYPE html>
<html>
<head>
	<title>Upload Image</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		
		<br><br>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
		  Upload Image
		</button><br><br>

		<form id="createForm" enctype="multipart/form-data">
			<!-- Modal -->
			<div class="modal fade" id="createModal" aria-hidden="true">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Upload Image</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
							</button>
						</div>
				      	<div class="modal-body">
				        	<div class="form-group">
							    <label>Image</label>
							    <input type="file" class="form-control" name="document" required="" id="documentId">
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
				        	<button type="button" class="btn btn-primary" onclick="uploadImage()">Upload</button>
				      	</div>
				    </div>
				</div>
			</div>
		</form>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		
		function uploadImage()
		{
			$('#createForm').submit();
		}

		$(document).ready(function (e) {
		    $('#createForm').on('submit',(function(e) {
		        e.preventDefault();
		        var formData = new FormData(this);

		        $.ajax({
		            type:'POST',
		            url: "<?php echo base_url('ImageUploadController/uploadImageFun'); ?>",
		            data:formData,
		            cache:false,
		            contentType: false,
		            processData: false,
		            success:function(response){
		            	
		            	alert('successfully uploaded');
		            	$('#createForm')[0].reset();
		            	$('#createModal').hide();
		            },
		            error: function(response){
		                alert(response);
		            }
		        });
		    }));
		});
	</script>
</body>
</html>