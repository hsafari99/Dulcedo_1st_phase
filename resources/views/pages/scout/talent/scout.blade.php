@extends('layouts.main')


@section('content')
<div class="container">	
		<form action="	" class="col-md-8 mx-auto px-0" enctype="multipart/form-data">
			<h3 class="text-body py-5">New Talent Subscription Form:</h3>
			<div class="input-group mb-3">
		    	<div class="input-group-prepend">
		      		<span class="input-group-text d-block" style="width: 114px">
		      			
		      		</style>First Name:</span>
		    	</div>
		    	<input type="text" class="form-control" placeholder="">
		    </div>
		  	<div class="input-group mb-3">
		    	<div class="input-group-prepend">
		      		<span class="input-group-text d-block" style="width: 114px">Middle Name:</span>
		    	</div>
		    	<input type="text" class="form-control" placeholder="">
		    </div>
		  	<div class="input-group mb-3">
		    	<div class="input-group-prepend">
		      		<span class="input-group-text d-block" style="width: 114px">Last Name:</span>
		    	</div>
		    	<input type="text" class="form-control" placeholder="">
		    </div>			
		    <div class="input-group mb-3">
		    	<div class="input-group-prepend">
		      		<span class="input-group-text d-block" style="width: 114px">Age:</span>
		    	</div>
		    	<input type="text" class="form-control" placeholder="">
		    </div>
		    <div class="input-group mb-3">
		    	<div class="input-group-prepend">
		      		<span class="input-group-text d-block" style="width: 114px">Height:</span>
		    	</div>
		    	<input type="text" class="form-control" placeholder="">
		    </div>
		    <div class="input-group mb-3">
		    	<div class="input-group-prepend">
		      		<span class="input-group-text d-block" style="width: 114px">Weight:</span>
		    	</div>
		    	<input type="text" class="form-control" placeholder="">
		    </div>
		    <div class="input-group mb-3">
		    	<div class="input-group-prepend">
		      		<span class="input-group-text d-block" style="width: 114px">Address:</span>
		    	</div>
		    	<input type="text" class="form-control" placeholder="">
		    </div>
		    <div class="input-group mb-3">
		    	<div class="input-group-prepend">
		      		<span class="input-group-text d-block" style="width: 114px">Phone:</span>
		    	</div>
		    	<input type="text" class="form-control" placeholder="">
		    </div>
		    <div class="input-group mb-3">
		    	<div class="input-group-prepend">
		      		<span class="input-group-text d-block" style="width: 114px">Email:</span>
		    	</div>
		    	<input type="text" class="form-control" placeholder="">
		    </div>
		  	<div class="input-group mb-3">
		    	<div class="input-group-prepend">
		      		<span class="input-group-text d-block pt-3" style="width: 114px;">Remark:</span>
		    	</div>
		    	<textarea name="" class="form-control"></textarea> 
		    </div>
			<div class="custom-file">
		<input type="file" class="custom-file-input" id="customFile">
	    		<label class="custom-file-label" for="customFile">Choose photo</label>
	  		</div>
			<div class="form-group pb-5 row">
				<input type="submit" class="btn btn-success col-sm-3 mr-auto ml-3 my-2" value="submit">
				<input type="reset" class="btn btn-danger col-sm-3 ml-auto mr-3 my-2" value="cancel">
			</div>

		</form>
</div>
<script>
// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function() {
	  var fileName = $(this).val().split("\\").pop();
	  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>
@endsection